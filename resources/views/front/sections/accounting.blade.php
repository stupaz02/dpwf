<div class="card mt-4">
        <div class="card-header  card-active" id="headingOne">
          <h5 class="mb-0">
            <button class="btn btn-link text-white " data-toggle="collapse" data-target="#collapseOne"  aria-expanded="false" aria-controls="collapseOne">
                    <i class="fa fa-folder-open-o"></i> Accounting
            </button>
          </h5>
        </div>
    
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
          <div class="card-body text-dark">
             @if($accounting->count() > 0)
              <table class="table table-hover table-sm ">
                      <thead class="card-active text-white bg-dark">
                      <tr>
                        
                          <th width="10">#</th>
                          <th >Title</th>
                          <th >Date</th>
                      </tr>
                  </thead>
                  
                  <tbody>
                  @foreach($accounting as $index => $acctng)
                  <tr>
                   <td class="font-weight-bold">{{ $index + 1}}.</b></td>
                    <td id="link">
                      <a href="{{ route('front.show', $acctng->slug)}}">
                          <p class="text-dark"> {!! $acctng->title !!}</p>
                      </a>  
                    </td>  
                    <td>
                          {{ $acctng->dateFormatted() }}
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



      