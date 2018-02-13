<div class="card">
        <div class="card-header card-active" id="headingThree">
            <h5 class="mb-0">
            <button class="btn btn-link collapsed text-white" data-toggle="collapse" data-target="#unnumbered" aria-expanded="false" aria-controls="lrmds">
                    <i class="fa fa-building"></i> Unnumbered
            </button>
            </h5>
        </div>
        <div id="unnumbered" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
            <div class="card-body text-dark">
                    @if($unnumbered->count() > 0)
                    <table class="table table-hover table-sm ">
                            <thead class="card-active text-white bg-dark">
                            <tr>
                            
                                <th width="10">#</th>
                                <th >Title</th>
                                <th >Date</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                 @foreach($unnumbered as $index =>$unb)
                        <tr>
                        <td class="font-weight-bold">{{ $index + 1}}.</b></td>
                        <td id="link">
                            <a href="{{ route('front.show', $unb->slug)}}">
                                <p class="text-dark"> {!! $unb->title !!}</p>
                            </a>  
                        </td>  
                        <td>
                                {{ $unb->dateFormatted() }}
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