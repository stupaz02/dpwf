<table class="table table-bordered">
    <thead>
        <tr class="b-header">
            
            <td width="120">Action</td>
            <td width="300">Slide Name</td>
            <td width="300">Slide Image</td>
            <td>Slide Caption</td>
            
        </tr>
    </thead>
    <tbody>
       @foreach($slides as $slide)
      
             <tr>
                 <td>
                     {!! Form::open(['method' => 'DELETE', 'route' =>['slides.destroy', $slide->id]])!!}
                     <a href="{{ route('slides.edit', $slide->id)}}" class="btn btn-xs btn-default">
                     <i class="fa fa-edit"></i>
                     </a>

                   
                        
                         <button  type="submit" onclick="return confirm('Are you sure?')" class="btn btn-xs btn-danger">
                             <i class="fa fa-times"></i>
                         </button>
                   
                  
                     {!! Form::close() !!}
                 </td>
                 <td>{{ $slide->title }}</td>
                 <td><img src="{{$slide->image ? $slide->image_thumb_url: 'http://placehold.it/200x150&text=No+Image'}}" style="width:100px; height:50px;" alt="{{ $slide->title}}"></td>
                 <td>{{ $slide->caption }}</td>
                 {{--  <td>{{ $slides->count()}}</td>  --}}
             
              
             </tr>

         @endforeach
    </tbody>
</table>