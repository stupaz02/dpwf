<table class="table table-bordered">
        <thead>
            <tr class="b-header">
                
                <td width="120">Action</td>
                <td width="300">Title</td>
                <td width="300">Body</td>
            
                
            </tr>
        </thead>
        <tbody>
           @foreach($history as $hty)
          
                 <tr>
                     <td>
                         {!! Form::open(['method' => 'DELETE', 'route' =>['pages.destroy', $hty->id]])!!}
                         <a href="{{ route('pages.edit', $hty->id)}}" class="btn btn-xs btn-default">
                         <i class="fa fa-edit"></i>
                         </a>
    
                       
                            
                             <button  type="submit" onclick="return confirm('Are you sure?')" class="btn btn-xs btn-danger">
                                 <i class="fa fa-times"></i>
                             </button>
                       
                      
                         {!! Form::close() !!}
                     </td>
                     <td>{{ $hty->title }}</td>
                    
                     <td>{{ str_limit($hty->body, 300) }}</td>
                     {{--  <td>{{ $slides->count()}}</td>  --}}
                 
                  
                 </tr>
    
             @endforeach
        </tbody>
    </table>