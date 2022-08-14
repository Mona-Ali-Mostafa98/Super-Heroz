 @if (session()->has('success'))
     <span class="alert alert-success">
         {{ session('success') }}
     </span>
 @endif

 @if (session()->has('error'))
     <span class="alert alert-danger">
         {{ session('error') }}
     </span>
 @endif
