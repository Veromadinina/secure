<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Détail</title>

  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
  <div>
    <div class="px-10 py-20 bg-gray-100 grid gap-10 lg:grid-cols-3 xl:grid-cols-4 sm:grid-cols-2">
      <div class="max-w-xs rounded-md overflow-hidden shadow-lg hover:scale-105 transition duration-500 cursor-pointer">
        <div>
          <img src="{{Storage::url($actu->image)}}" alt="" />
        </div>
        <div class="py-4 px-4 bg-white">
          <h3 class="text-md font-semibold text-gray-600">{{ $actu->titre }}</h3>
         
            <p>{{ $actu->description }}</p>
          
        </div>
      </div>
      
    </div>
  </div>
</body>
</html>