 @extends('layouts.admin')
 @section('content')

 <div class="mb-3">
     <h6 class="mb-0 font-weight-semibold">
         Basic tabs layout
     </h6>
     <span class="text-muted d-block">Default tabs layout options</span>
 </div>

 <div class="row">
     <div class="col-md-6">
         <div class="card">
             <div class="card-header header-elements-inline">
                 <h6 class="card-title">Basic tabs</h6>
                 <div class="header-elements">
                     <div class="list-icons">
                         <a class="list-icons-item" data-action="collapse"></a>
                         <a class="list-icons-item" data-action="reload"></a>
                         <a class="list-icons-item" data-action="remove"></a>
                     </div>
                 </div>
             </div>

             <div class="card-body">
                 <ul class="nav nav-tabs">
                     <li class="nav-item"><a href="#basic-tab1" class="nav-link active" data-toggle="tab">Active</a>
                     </li>
                     <li class="nav-item"><a href="#basic-tab2" class="nav-link" data-toggle="tab">Inactive</a></li>
                     <li class="nav-item dropdown">
                         <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Dropdown</a>
                         <div class="dropdown-menu dropdown-menu-right">
                             <a href="#basic-tab3" class="dropdown-item" data-toggle="tab">Dropdown tab</a>
                             <a href="#basic-tab4" class="dropdown-item" data-toggle="tab">Another tab</a>
                         </div>
                     </li>
                 </ul>

                 <div class="tab-content">
                     <div class="tab-pane fade show active" id="basic-tab1">
                         Basic tabs example using <code>.nav-tabs</code> class. Also requires base <code>.nav</code>
                         class.
                     </div>

                     <div class="tab-pane fade" id="basic-tab2">
                         Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid
                         laeggin.
                     </div>

                     <div class="tab-pane fade" id="basic-tab3">
                         DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg
                         whatever.
                     </div>

                     <div class="tab-pane fade" id="basic-tab4">
                         Aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore
                         aesthet.
                     </div>
                 </div>
             </div>
         </div>
     </div>

     <div class="col-md-6">
         <div class="card">
             <div class="card-header header-elements-inline">
                 <h6 class="card-title">Basic justified</h6>
                 <div class="header-elements">
                     <div class="list-icons">
                         <a class="list-icons-item" data-action="collapse"></a>
                         <a class="list-icons-item" data-action="reload"></a>
                         <a class="list-icons-item" data-action="remove"></a>
                     </div>
                 </div>
             </div>

             <div class="card-body">
                 <ul class="nav nav-tabs nav-justified">
                     <li class="nav-item"><a href="#basic-justified-tab1" class="nav-link active"
                             data-toggle="tab">Active</a></li>
                     <li class="nav-item"><a href="#basic-justified-tab2" class="nav-link"
                             data-toggle="tab">Inactive</a></li>
                     <li class="nav-item dropdown">
                         <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Dropdown</a>
                         <div class="dropdown-menu dropdown-menu-right">
                             <a href="#basic-justified-tab3" class="dropdown-item" data-toggle="tab">Dropdown tab</a>
                             <a href="#basic-justified-tab4" class="dropdown-item" data-toggle="tab">Another tab</a>
                         </div>
                     </li>
                 </ul>

                 <div class="tab-content">
                     <div class="tab-pane fade show active" id="basic-justified-tab1">
                         Easily make tabs equal widths of their parent with <code>.nav-justified</code> class.
                     </div>

                     <div class="tab-pane fade" id="basic-justified-tab2">
                         Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid
                         laeggin.
                     </div>

                     <div class="tab-pane fade" id="basic-justified-tab3">
                         DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg
                         whatever.
                     </div>

                     <div class="tab-pane fade" id="basic-justified-tab4">
                         Aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore
                         aesthet.
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>


 @endsection
