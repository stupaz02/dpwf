<table class="table table-bordered">
                       <thead>
                           <tr>
                               <td width="120">Action</td>
                               <td>Title</td>
                               <td width="120">Author</td>
                               <td width="150">Category</td>
                               <td width="170">Date</td>
                           </tr>
                       </thead>
                       <tbody>
                         <?php $request = request(); ?>
                          @foreach($posts as $post)
                         
                                <tr>
                                    <td>
                                        {!! Form::open(['method' => 'DELETE', 'route' =>['post.destroy', $post->id]])!!}
                                        
                                            @if(check_user_permissions($request, "Post@edit", $post->id))
                                                <a href="{{ route('post.edit', $post->id)}}" class="btn btn-xs btn-default">
                                                <i class="fa fa-edit"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('post.edit', $post->id)}}" onClick="return false" class="btn btn-xs btn-default disabled">
                                                <i class="fa fa-edit"></i>
                                                </a>
                                            @endif  
                                            
                                            @if(check_user_permissions($request, "Post@destroy", $post->id))
                                                <button  type="submit" class="btn btn-xs btn-danger">
                                                <i class="fa fa-times"></i>
                                                </button>
                                            @else    
                                                <button  type="submit" onClick="return false" class="btn btn-xs btn-danger disabled">
                                                <i class="fa fa-times"></i>
                                                </button>
                                            @endif    
                                        {!! Form::close() !!}
                                    </td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->author->name }}</td>
                                    <td>{{ $post->category->title }}</td>
                                    <td>
                                        <abbr title="{{ $post->dateFormatted(true)}}">{{ $post->dateFormatted() }}</abbr>
                                        {!! $post->publicationLabel() !!}
                                    </td>
                                </tr>

                            @endforeach
                       </tbody>
                   </table>