@extends('layouts.app')

@section('content')
<div class="container page-home lift-and-drop-shadow">
    <div class="row justify-content-center">
        <div class="col-md-12 card">

            @includeIf('site.banner')

            <h2 class="text-center mt-4 mb-4"><b>About Us</b></h2>

            <div id="who-we-are" class="row mb-3">
                <div class="col-md-12">
                    <h3><b>Who we are</b></h3>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop p
                    </p>     
                </div>
            </div>


            <div id="what-is-our-objective" class="row mb-3">
                <div class="col-md-12">
                    <h3><b>What is our objective</b></h3>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop p
                    </p>  
                </div>
            </div>


            <div id="how-to-contact-us" class="row mb-3">
                <div class="col-md-12">
                    <h3><b>How to get in touch with us</b></h3>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop p
                    </p>   
                </div>
            </div>

            
        </div>
    </div>
</div>
</div>

@endsection
