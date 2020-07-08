@extends('/layout.master',  ['title' => 'Contanct'])
{{-- @section('title', 'Contact') --}}
@section('content')

<div class="container">
    <div class="title m-b-md">
    Contact saya
    </div>  
    <body>
        Halo, nama saya {!! $nama !!}
        usia saya adalah {!! $umur !!}
        pekerjaan saya {!! $pekerjaan !!}
            <p>
                Tentang saya
            </p>

        {!! nl2br($desk) !!}
    </body>
</div>
@endsection
