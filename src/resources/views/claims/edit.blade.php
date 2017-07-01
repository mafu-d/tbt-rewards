@extends('master')

@section('content')
    <h1>Edit claim</h1>
    <form action="{{ action('ClaimsController@save') }}" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-8">
                {{ csrf_field() }}
                <p>
                    <label for="id">Claim ID</label>
                    {{ $claim->id }}
                    <input type="hidden" name="id" value="{{ $claim->id }}">
                </p>
                <p>
                    <label for="status">Status</label>
                    {{ $claim->status() }}
                </p>
                <p>
                    <label for="company">Company you are claiming on behalf of</label>
                    <input type="text" class="form-control" id="company" name="company" value="{{ $claim->company }}">
                </p>
                <p>
                    <label for="address1">Address line 1</label>
                    <input type="text" class="form-control" id="address1" name="address1" value="{{ $claim->address1 }}">
                </p>
                <p>
                    <label for="address2">Address line 2</label>
                    <input type="text" class="form-control" id="address2" name="address2" value="{{ $claim->address2 }}">
                </p>
                <p>
                    <label for="city">City</label>
                    <input type="text" class="form-control" id="city" name="city" value="{{ $claim->city }}">
                </p>
                <p>
                    <label for="county">County</label>
                    <input type="text" class="form-control" id="county" name="county" value="{{ $claim->county }}">
                </p>
                <p>
                    <label for="postcode">Postcode</label>
                    <input type="text" class="form-control" id="postcode" name="postcode" value="{{ $claim->postcode }}">
                </p>
                <p>
                    <label for="country">Country</label>
                    <select name="country" id="country" class="form-control">
                        <option value="UK" {{ $claim->country === 'UK' ? 'selected' : '' }}>United Kingdom</option>
                        <option value="IE" {{ $claim->country === 'IE' ? 'selected' : '' }}>Republic of Ireland</option>
                    </select>
                </p>
                <p>
                    <label for="phone">Phone number</label>
                    <input type="tel" class="form-control" id="phone" name="phone" value="{{ $claim->phone }}">
                </p>
                <p>
                    <label for="part_number">Part number</label>
                    <input type="text" class="form-control" id="part_number" name="part_number" value="{{ $claim->part_number }}">
                </p>
                <p>
                    <label for="part_quantity">Quantity sold</label>
                    <input type="number" class="form-control" id="part_quantity" name="part_quantity" value="{{ $claim->part_quantity }}">
                </p>
                <p>
                    <label for="reward_preference">Preferred reward</label>
                    <select name="reward_preference" id="reward_preference" class="form-control">
                        @foreach (\App\Claim::$reward_preferences as $key => $value)
                            <option value="{{ $key }}" {{ $claim->reward_preference == $key ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>
                </p>
                <p>
                    <button class="btn btn-primary" type="submit">Save</button>
                </p>
            </div>
            <div class="col-md-4">
                <h4>Upload supporting documents</h4>
                <input type="hidden" name="removeUpload" value="">
                @foreach ($claim->uploads as $upload)
                    <p><button class="btn btn-danger btn-xs remove-upload-btn" data-id="{{ $upload->id }}"><span class="glyphicon glyphicon-remove"></span></button> {{ $upload->name() }}</p>
                @endforeach
                <p>
                    <label class="btn btn-primary" for="my-file-selector">
                        <input id="my-file-selector" type="file" style="display:none"
                        onchange="$('#upload-file-info').html(this.files[0].name); $('#upload-btn.hidden').removeClass('hidden');" name="file">
                        Choose file
                    </label>
                    <span id="upload-file-info"></span>
                </p>
                <p>
                    <button class="btn btn-primary hidden" id="upload-btn" type="submit">Upload</button>
                </p>
            </div>
        </div>
    </form>
    @if ($claim->status === 1)
        <form action="{{ action('ClaimsController@submit') }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $claim->id }}">
            <button class="btn btn-success" type="submit">Submit</button>
        </form>
    @endif
@endsection
