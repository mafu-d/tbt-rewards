@extends('master')

@section('content')
    <h1>Edit claim</h1>
    <form action="{{ action('ClaimsController@save') }}" method="post">
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
                <option value="1" {{ $claim->reward_preference === '1' ? 'selected' : '' }}>&pound;250 Amazon vouchers</option>
                <option value="2" {{ $claim->reward_preference === '2' ? 'selected' : '' }}>London Theatre Weekend voucher</option>
                <option value="3" {{ $claim->reward_preference === '3' ? 'selected' : '' }}>Lenovo Tab3 10 Business Tablet</option>
            </select>
        </p>
        <p>
            <button class="btn btn-primary" type="submit">Save</button>
        </p>
    </form>
    @if ($claim->status === 1)
        <form action="{{ action('ClaimsController@submit') }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{ $claim->id }}">
            <button class="btn btn-primary" type="submit">Submit</button>
        </form>
    @endif
@endsection
