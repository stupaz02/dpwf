<div class="card">
    <div class="card-header card-active" id="headingTwo">
        <h5 class="mb-0">
        <button class="btn btn-link collapsed text-white " data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <i class="fa fa-folder-open-o"></i> Cashier
        </button>
        </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
        <div class="card-body text-dark">
            @if($cashier->count() > 0)
            <table class="table table-hover table-sm ">
                    <thead class="card-active text-white bg-dark">
                    <tr>
                      
                        <th width="10">#</th>
                        <th >Title</th>
                        <th >Date</th>
                    </tr>
                </thead>
                
                <tbody>
                @foreach($cashier as $index =>$cshr)
                <tr>
                 <td class="font-weight-bold">{{ $index + 1}}.</b></td>
                  <td id="link">
                    <a href="{{ route('front.show', $cshr->slug)}}">
                        <p class="text-dark"> {!! $cshr->title !!}</p>
                    </a>  
                  </td>  
                  <td>
                        {{ $cshr->dateFormatted() }}
                  </td>
                </tr>
                @endforeach

               </tbody>

            </table>

           @else

            <div class="alert alert-danger">
                  <p>No record found</strong>
              </div>

           @endif
        </div>
    </div>
</div>