@extends('layouts.main')

@section('content')

          <div class="panel panel-default">
            <table class="table">
                @foreach($contacts as $contact)
                    <tr>
                        <td class="middle">
                        <div class="media">
                            <div class="media-left">
                            <a href="#"></a>
                                <img class="media-object" src="{{ url( $contact->location() ) }}" width="100" height="100" alt="avatar">
                            </a>
                            </div>
                            <div class="media-body">
                            <h4 class="media-heading">{{ $contact->name }}</h4>
                            <address>
                                <strong>{{ $contact->company }}</strong><br>
                                {{ $contact->email }}
                            </address>
                            </div>
                        </div>
                        </td>
                        <td width="100" class="middle">
                        <div>
                            <form method="post" action="{{route('contacts.destroy',['id'=>$contact->id])}}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <a href="{{route('contacts.edit',['id' => $contact->id ])}}" class="btn btn-circle btn-default btn-xs" title="Edit">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </a>
                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-circle btn-danger btn-xs" title="Edit">
                                    <i class="glyphicon glyphicon-remove"></i>
                                </button>
                            </form>
                        </div>
                        </td>
                    </tr>
                @endforeach
            </table>
          </div>

          <div class="text-center">
            <nav>
                {{--  {!! $contacts->links() !!}  --}}
                {!! $contacts->appends( Request::query() )->render() !!}
                
            </nav>
          </div>

@endsection