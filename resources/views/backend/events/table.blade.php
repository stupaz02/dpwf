<table class="table table-bordered">
        <thead>
            <tr>
                <td width="120">Action</td>
                <td>Event Name</td>
                <td>Start Date</td>
                <td>End Date</td>
                {{--  <td width="120">Events Count</td>  --}}
               
            </tr>
        </thead>
        <tbody>
           @foreach($events as $event)
          
                 <tr>
                     <td>
                         {!! Form::open(['method' => 'DELETE', 'route' =>['events.destroy', $event->id]])!!}
                         <a href="{{ route('events.edit', $event->id)}}" class="btn btn-xs btn-default">
                         <i class="fa fa-edit"></i>
                         </a>

                         @if($event->id == config('cms.default_category_id'))
                             <button  type="submit" onclick="return false" class="btn btn-xs btn-danger disabled">
                                 <i class="fa fa-times"></i>
                             </button>
                         @else
                             <button  type="submit" onclick="return confirm('Are you sure?')" class="btn btn-xs btn-danger">
                                 <i class="fa fa-times"></i>
                             </button>
                         @endif
                      
                         {!! Form::close() !!}
                     </td>
                     <td>{{ $event->title }}</td>
                     <td>{{ $event->start_date }}</td>
                     <td>{{ $event->end_date }}</td>
                     {{--  <td>{{ $event->count()}}</td>  --}}
                 
                  
                 </tr>

             @endforeach
        </tbody>
    </table>