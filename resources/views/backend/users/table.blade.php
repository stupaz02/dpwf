<table class="table table-bordered">
                       <thead>
                           <tr>
                               <td width="120">Action</td>
                               <td>Name</td>
                               <td>Email</td>
                               <td>Role</td>
                              
                           </tr>
                       </thead>
                       <tbody>
                          @foreach($users as $user)
                         
                                <tr>
                                    <td>
                                       
                                        <a href="{{ route('users.edit', $user->id)}}" class="btn btn-xs btn-default">
                                        <i class="fa fa-edit"></i>
                                        </a>

                                        @if($user->id == config('cms.default_user_id'))
                                            <button  type="submit" onclick="return false" class="btn btn-xs btn-danger disabled">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        @else
                                            <a  href="{{ route('users.confirm', $user->id)}}" class="btn btn-xs btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        @endif
                                     
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email}}</td>
                                    <td>{{ $user->roles->first()->display_name}}</td>
                                
                                 
                                </tr>

                            @endforeach
                       </tbody>
                   </table>