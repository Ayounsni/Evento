<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
</head>
<body class="px-96">
    <div class="border-2 border-gray-950 mt-40 p-2">
        <p class="fs-4 fw-medium">TICKET N° 000{{$reservation->id}}</p>
    <p class="text-center fs-5 border-y-2 fw-bolder border-gray-400">Evenement {{$reservation->evenement->titre}}</p> 
    <p class=" text-center border-b-2  fs-5   ">Ticket Pour <span class="fw-medium border-b-2  fs-5"> {{$reservation->user->name}}</span>  </p>
    <p class=" text-center border-b-2  fs-5   ">Date : <span class="fw-medium border-b-2  fs-5"> {{$reservation->evenement->date}}</span>  </p>
    <p class=" text-center border-b-2  fs-5  ">Lieu : <span class="fw-medium border-b-2  fs-5">{{$reservation->evenement->lieu}}</span>  </p>         
            </div>      
    </div>  
</body>
</html>