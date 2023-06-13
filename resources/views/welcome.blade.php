<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">  

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" /> 
    <title>Document</title>
</head>
<body>
    <div class="contaner text-center bg-primary">
        <h1>Welcome </h1>
        <h4>Ask Your Question</h4>
    </div>
    @if(Session::has('success'))
        <p class="bg-success p-4 text-white">{{Session::get('success')}}</p>
    @endif

    @if(Session::has('error'))
        <p>{{Session::get('error')}}</p>
    @endif

   <form action="{{ route('index') }}" method="POST" >
    @csrf

    
    <div class="text-center">
        <input type="text"  class="form-control mb-3" name="title" id="question" placeholder="Tittle">
        <textarea id="question" class="form-control" name='question' placeholder="Your Question" rows="4"></textarea>
        <input type="submit" name = "submit" class="mt-3 btn btn-primary" value="SUBMIT" >
    </div>
   </form>

   <div class="container mt-4">
    <h1 class="fw-bold text-center">QUESTION</h1>

    @foreach ($questions as $question)
        <div class="card p-4 mb-2" >
            <div class="row">

                <div class="col-10">
                    <h5 class="card-title text-uppercase fw-bold">{{$question->title}}</h5>
                    <p>{{$question->question}}</p>
                </div>

                
                @if(Auth::User()->email === $question->email)
                    <div class="col-2">
                        <i class="fa fa-trash text-danger " style="float:right; margin-top:0px; "></i>
                    </div>

                @endif
            </div>
            {{-- <button class="btn btn-sm btn-primary"> --}}
                <div class="text-center">

                    <i class="fa fa-reply btn btn-sm btn-primary"> Reply</i>
                    
                </div>
            {{-- </button> --}}

        </div>
    @endforeach
        
   </div>
   
    
</body>
</html>