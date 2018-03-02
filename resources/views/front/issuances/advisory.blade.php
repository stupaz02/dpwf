<div class="card mt-4">
    <div class="card-header card-active" id="headingThree">
        <h5 class="mb-0">
        <button class="btn btn-link collapsed text-white" data-toggle="collapse" data-target="#advisory" aria-expanded="false" aria-controls="lrmds">
                <i class="fa fa-building"></i> Advisories
        </button>
        </h5>
    </div>
    <div id="advisory" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
        <div class="card-body text-dark">
            @if($advisory->count() > 0)
                    <table class="table table-hover table-sm ">
                            <thead class="card-active text-white bg-dark">
                            <tr>
                            
                                <th width="10">#</th>
                                <th width="30">Title</th>
                                <th width="50" >Date Published</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                 @foreach($advisory as $index =>$adv)
                        <tr>
                        <td class="font-weight-bold">{{ $index + 1}}.</b></td>
                        <td id="link">
                            <a href="{{ route('front.show', $adv->slug)}}">
                                <p class="text-dark"> {!! $adv->title !!}</p>
                            </a>  
                        </td>  
                        <td>
                                {{ $adv->published_at->format('m/d/Y') }}
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
  		   {{ $advisory->appends(request()->only(['title']))->links( "pagination::bootstrap-4")}}
        </div>
    </div>
</div>
