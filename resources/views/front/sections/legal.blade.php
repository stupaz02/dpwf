<div class="card">
    <div class="card-header card-active" id="headingThree">
        <h5 class="mb-0">
        <button class="btn btn-link collapsed text-white" data-toggle="collapse" data-target="#legal" aria-expanded="false" aria-controls="collapseThree">
                <i class="fa fa-building"></i> Legal
        </h5>
    </div>
    <div id="legal" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
        <div class="card-body text-dark">
            @if($legal->count() > 0)
                <table class="table table-hover table-sm ">
                        <thead class="card-active text-white bg-dark">
                        <tr>
                        
                            <th width="10">#</th>
                            <th >Title</th>
                            <th >Date</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    @foreach($legal as $index =>$l)
                    <tr>
                    <td class="font-weight-bold">{{ $index + 1}}.</b></td>
                    <td id="link">
                        <a href="{{ route('front.show', $l->slug)}}">
                            <p class="text-dark"> {!! $l->title !!}</p>
                        </a>  
                    </td>  
                    <td>
                            {{ $l->dateFormatted() }}
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