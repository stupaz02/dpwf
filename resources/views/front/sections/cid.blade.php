<div class="card">
    <div class="card-header card-active" id="headingThree">
        <h5 class="mb-0">
        <button class="btn btn-link collapsed text-white" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                <i class="fa fa-folder-open-o"></i> Curriculum Implementation Division (CID)
        </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
        <div class="card-body text-dark">
            @if($cid->count() > 0)
                <table class="table table-hover table-sm ">
                        <thead class="card-active text-white bg-dark">
                        <tr>
                        
                            <th width="10">#</th>
                            <th >Title</th>
                            <th >Date</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    @foreach($cid as $index =>$c)
                    <tr>
                    <td class="font-weight-bold">{{ $index + 1}}.</b></td>
                    <td id="link">
                        <a href="{{ route('front.show', $c->slug)}}">
                            <p class="text-dark"> {!! $c->title !!}</p>
                        </a>  
                    </td>  
                    <td>
                            {{ $c->dateFormatted() }}
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