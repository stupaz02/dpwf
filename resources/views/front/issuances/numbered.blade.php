<div class="card ">
        <div class="card-header card-active" id="headingThree">
            <h5 class="mb-0">
            <button class="btn btn-link collapsed text-white" data-toggle="collapse" data-target="#lrmds" aria-expanded="false" aria-controls="lrmds">
                    <i class="fa fa-building"></i> Numbered
            </button>
            </h5>
        </div>
        <div id="lrmds" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
            <div class="card-body text-dark">
             @if($numbered->count() > 0)
                    <table class="table table-hover table-sm ">
                            <thead class="card-active text-white bg-dark">
                            <tr>
                            
                                <th width="10">#</th>
                                <th >Title</th>
                                <th >Date Published</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                 @foreach($numbered as $index =>$nb)
                        <tr>
                        <td class="font-weight-bold">{{ $index + 1}}.</b></td>
                        <td id="link">
                            <a href="{{ route('front.show', $nb->slug)}}">
                                <p class="text-dark"> {!! $nb->title !!}</p>
                            </a>  
                        </td>  
                        <td>
                                {{ $nb->published_at->format('m/d/Y') }}
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
		   {{$numbered->appends(request()->only(['title']))->links("pagination::bootstrap-4")}}   		
            </div>
        </div>
    </div>
