<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Mail;
use App\Mail\SendOtpMail;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function errorHandle($validator)
    {
        $message = $validator->errors()->first();
        return response()->json([
            'statusCode' => 422,
            'success'    => false,
            'message'    => $message
        ], 422);
    }

    public function successRes($statusCode = null, $message = null, $data = null)
    {
        return response()->json([
            'success'    => true,
            'statusCode' => $statusCode,
            'message'    => $message,
            'data'       => $data
        ], $statusCode);
    }

    public function errorRes($statusCode = null, $message = null, $data = null)
    {
        return response()->json([
            'success'    => false,
            'statusCode' => $statusCode,
            'message'    => $message,
            'data'       => $data
        ], $statusCode);
    }

    public function sendEmail($to, $subject, $templatePath, $otp, $userName)
    {
        $mailData = [
            'subject' => $subject,
            'otp' => $otp,
            'userName' => $userName,
            'templatePath' => $templatePath
        ];

        Mail::to($to)->send(new SendOtpMail($mailData));
    }

    public function fileUpload($image)
    {
        $folderPath = "user/img/";
        $image = $image;
        $base64Image = explode(";base64,", $image);
        if (count($base64Image) != 2) {
            return $this->sendError('Invalid image format.', []);
        }
        $explodeImage = explode("image/", $base64Image[0]);
        $imageType = $explodeImage[1];
        if (!in_array($imageType, ['jpeg', 'jpg', 'png'])) {
            return $this->sendError('Unsupported image type. Supported types are jpeg, jpg, png.', []);
        }
        $image_base64 = base64_decode($base64Image[1]);
        $fileName = uniqid() . '-' . time() . '.' . $imageType;
        $file = $folderPath . $fileName;
        file_put_contents(public_path($file), $image_base64);
        // Storage::disk('public')->put($file, $image_base64);
        $imageUrl = 'user/img/' . $fileName;

        return $imageUrl;
    }
}
