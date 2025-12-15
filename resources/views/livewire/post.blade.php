<div>
   <div class='container'>

      
   @foreach ($posts as $post)
       
    
      <div class='row justify-content-center mt-3 rounded-4 border bg-white shadow' style=''>
         <div class='col-md-12'>
               <div class='row'>
                                
                  <div class='col-md-1'><img src='{{ $post->IMAGE == 'fallback-image.jpg' ? '/fallback-image.jpg' : '/storage/images/' . $post->IMAGE }}' class='avatar-tiny-new'></div>
                  <div class='col-md-11'>
                        <div class='col-md-12 mt-1'><b>{{ strtoupper($post->TITLE) }}</b></div>
                     
                        <div class='col-md-12 mt-1 small'>posted last {{ $post->POSTDATE }} by : <i>{{ $post->USERNAME }}</i></div>
                  </div>
                         
               </div>
         </div>
                 
                  <hr>
      
         <div class='col-md-11  mx-auto mt-1' style='height:300px;'>{{ $post->MESSAGE }}</div>
      </div>
 
   @endforeach
      <div>
</div>
