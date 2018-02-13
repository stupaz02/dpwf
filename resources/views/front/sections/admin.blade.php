<div class="card">
        <div class="card-header  card-active" id="headingOne">
          <h5 class="mb-0">
            <button class="btn btn-link text-white " data-toggle="collapse" data-target="#admin"  aria-expanded="false" aria-controls="collapseOne">
                    <i class="fa fa-folder-open-o"></i> Admin
            </button>
          </h5>
        </div>
    
        <div id="admin" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
          <div class="card-body text-dark">
             @if($admin->count() > 0)
              <table class="table table-hover table-sm ">
                      <thead class="card-active text-white bg-dark">
                      <tr>
                        
                          <th width="10">#</th>
                          <th >Title</th>
                          <th >Date</th>
                      </tr>
                  </thead>
                  
                  <tbody>
                  @foreach($admin as $index => $adm)
                  <tr>
                   <td class="font-weight-bold">{{ $index + 1}}.</b></td>
                    <td id="link">
                      <a href="{{ route('front.show', $adm->slug)}}">
                          <p class="text-dark"> {!! $adm->title !!}</p>
                      </a>  
                    </td>  
                    <td>
                          {{ $adm->dateFormatted() }}
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



      