<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Real time </title>
</head>
<body>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, ipsa consequuntur. Deleniti corrupti reprehenderit inventore illo! Architecto perferendis quidem sunt molestias, veritatis impedit voluptate aliquid, possimus amet assumenda quod deleniti.
    Nulla, corporis soluta! Numquam, laboriosam vel. Ut explicabo sequi ab beatae, soluta iure voluptates illum dolorum laudantium, dolorem veniam odio voluptatem, dignissimos corporis similique! Doloremque impedit mollitia similique fugiat dolor?
    Velit praesentium quidem sequi cumque quisquam eum? Doloremque minima, quo beatae sint illum optio, tempora eius ullam obcaecati inventore placeat ad nam pariatur ex quaerat et maxime, tenetur hic quas!
    Dolores saepe voluptas eius porro iure voluptate, et magnam illum accusantium, nostrum dicta optio molestias! Optio ut magnam cumque, dicta molestias aliquid quia dolore earum, maxime ratione quo dolorem. Optio?
    Placeat quidem, repellat officiis modi eius voluptatum impedit facere numquam commodi nam. Impedit dolorem tempore rem id, omnis deserunt vitae provident maxime repellat ratione animi non, officia libero delectus cupiditate.
    Quibusdam, et facere officiis ducimus nulla dolorum. Quasi nesciunt minus atque deleniti? Voluptate, possimus quia iste quae dolores ducimus officiis culpa. Iure nulla eaque, sint ratione facere non incidunt dolorum?
    Perferendis, doloremque delectus iure consectetur quaerat amet laudantium maxime recusandae ex hic veniam ut modi, vel sed repudiandae velit sapiente perspiciatis tenetur blanditiis ipsum illum quae id eum praesentium. Ea!
    Iste voluptate fuga, odio accusamus debitis nesciunt rerum vero! Ut nisi et eos perferendis repudiandae, perspiciatis officiis quia, beatae deserunt autem tempore veritatis rem nulla! Adipisci voluptatibus rerum quaerat ipsa.
    Quo vero praesentium facere atque iste hic doloribus sint repudiandae vel saepe cupiditate rem perferendis, libero dolore doloremque quisquam exercitationem neque quam, eaque aperiam voluptates cum. Amet dignissimos nobis placeat?
    Error cumque sed, minus molestias libero quaerat rerum quidem optio commodi, magnam porro minima tempore cupiditate, eaque soluta reprehenderit culpa illo ipsum? A architecto dicta quidem ipsum quibusdam ducimus voluptatem.
    Harum rerum reprehenderit ab delectus excepturi quidem iure unde id, fuga necessitatibus repellat voluptatum placeat ipsa nam natus similique! Atque quo nemo ratione tempora iste minus cupiditate eos sequi molestias.
    Dolorem enim ullam dolorum itaque libero necessitatibus ipsum iusto, a aperiam, ipsam fuga distinctio unde eum numquam! Unde ipsum molestiae perspiciatis velit, earum voluptas cum sed, dignissimos quas, consequatur laborum.
    Accusantium expedita a facilis quas nobis deleniti magni. Delectus nihil quam cumque minus fuga voluptates quibusdam aliquam et maiores pariatur quidem nemo sequi in reiciendis, atque nostrum itaque placeat beatae.
    Ullam nostrum fugit pariatur. Similique non aperiam alias esse, necessitatibus vel eveniet totam hic. Magni ea dolore voluptatibus, neque, nesciunt nisi voluptate, rem dolor tempora officia esse suscipit quia architecto!
    A nesciunt libero possimus atque ut accusamus tempore, hic quidem non ex quaerat rem incidunt obcaecati quia odio excepturi magni dolore? Exercitationem laboriosam iure nostrum voluptatum molestias maxime odio dolorem.
    Eos ad eligendi inventore, quisquam, vel mollitia, sequi atque aperiam ipsam illum voluptates dolorum ut porro sit nihil minima vero sunt praesentium quos aliquam adipisci aspernatur exercitationem quidem. Molestias, dolores?
    Labore vel at quaerat nobis magni. Nemo facere esse delectus suscipit explicabo repudiandae cum quisquam veniam, alias autem officia qui et voluptatum ex dolorum quos aperiam animi nihil, similique id.
    Quos, aliquam. Officia voluptates ipsa autem natus voluptas ex voluptatibus aut quasi quae asperiores quibusdam hic praesentium eaque optio excepturi tempora maiores deserunt qui reiciendis exercitationem quos, mollitia numquam facere.
    Suscipit, provident cum fugit dignissimos fuga nesciunt! Ducimus velit eum, ab aut voluptates alias at ipsa consequatur nam non sunt iste, error dicta itaque. Commodi, quasi. Esse sit nam sed.
    Deleniti eligendi itaque eaque distinctio maiores laborum fuga delectus vitae libero aperiam? Iusto suscipit vitae cum corrupti quod porro atque obcaecati in distinctio, laborum unde nesciunt cupiditate consequatur ex possimus?

    <script>
        // Connect to the WebSocket server
        const socket = new WebSocket("ws://127.0.0.1:6001");
    
        // Handle connection open
        socket.onopen = () => {
            console.log("Connected to WebSocket server");
        };
    
        // Handle messages from the server
        socket.onmessage = (event) => {
            console.log("Message from server:", event.data);
            alert(event.data); // Display the message
        };

        socket.onmyMessage = (event) => {
            console.log("Message from server:", event.data);
            alert(event.data); // Display the message
        };
    
        // Handle connection close
        socket.onclose = () => {
            console.log("WebSocket connection closed");
        };
    
        // Handle connection errors
        socket.onerror = (error) => {
            console.error("WebSocket error:", error);
        };
    
        // Send a message to the server
        function sendMessage() {
            socket.send("Hello from the browser!");
        }
    </script>
    
    <button onclick="sendMessage()">Send Message</button>
    
</body>
</html>