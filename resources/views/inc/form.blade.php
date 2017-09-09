<div class="panel panel-default">
    <div class="panel-heading">
        <strong>Update Contact</strong>
    </div>
    <div class="panel-body">
        <div class="form-horizontal">
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="name" class="control-label col-md-3">Name</label>
                        <div class="col-md-8">
                            <input name="name" id="name" class="form-control" type="text" value="{{ old('name',$contact['name']) }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="company" class="control-label col-md-3">Company</label>
                        <div class="col-md-8">
                            <input name="company" id="company" class="form-control" type="text" value="{{ old('company', $contact->company)}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email" class="control-label col-md-3">Email</label>
                        <div class="col-md-8">
                            <input name="email" id="email" class="form-control" type="text" value="{{ old('email',$contact->email) }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone" class="control-label col-md-3">Phone</label>
                        <div class="col-md-8">
                            <input name="phone" id="phone" class="form-control" type="text" value=" {{ old( 'phone',$contact->phone ) }} ">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="control-label col-md-3">Address</label>
                        <div class="col-md-8">
                            <textarea name="address" id="address" rows="3" class="form-control">{{ old( 'address', $contact->address ) }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="group" class="control-label col-md-3">Group</label>
                        <div class="col-md-5">
                            <select name="group_id" id="group" class="form-control">
                          @foreach($groups as $key => $group)
                            <option value="{{ $key }}" @if(  old('group_id',$contact->group->id )  == $key )  selected="{{ old('group_id',$contact->group->id ) }}"   @endif >{{ $group }} </option>
                           
                          @endforeach
                        </select>
                        </div>
                        <div class="col-md-3">
                            <a href="#" id="add-group-btn" class="btn btn-default btn-block">Add Group</a>
                        </div>
                    </div>
                    <div class="form-group" id="add-new-group" style="display: none;">
                        <div class="col-md-offset-3 col-md-8">
                            <div class="input-group">
                                <input name="new_group" id="new_group" class="form-control" type="text">
                                <span class="input-group-btn">
                            <a href="#" class="btn btn-default">
                              <i class="glyphicon glyphicon-ok"></i>
                            </a>
                          </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                        <div class="fileinput-new thumbnail" style="width: 150px; height: 150px;">
                            <img src="http://placehold.it/150x150" alt="Photo">
                        </div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                        <div class="text-center">
                            <span class="btn btn-default btn-file"><span class="fileinput-new">Choose Photo</span><span class="fileinput-exists">Change</span>
                            <input
                                name="..." type="file"></span>
                                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-footer">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-offset-3 col-md-6">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('contacts.index') }}" class="btn btn-default">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>