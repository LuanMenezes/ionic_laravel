<div class="form-group">
    <label for="">Title</label>
    <input type="text" class="form-control" name="title" placeholder="Title" value="{{isset($offer->title) ? $offer->title : ''}}">
</div>
<div class="form-group">
    <label for="">Description</label>
    <input type="text" class="form-control" name="description" placeholder="Description" value="{{isset($offer->description) ? $offer->description : ''}}">
</div>

@if(isset($offer->img))
    <img class="img-responsive" src="{{asset($offer->img)}}" alt="">
@endif

<div class="form-group">
    <label for="">Image</label>
    <input type="file" class="form-control" name="img">
</div>

<div class="form-group">
    <label for="">Price</label>
    <input type="number" step="0.01" class="form-control" name="price" placeholder="Price" value="{{isset($offer->price) ? $offer->price : ''}}">
</div>

<div class="form-group">
    <label for="">Validity</label>
    <input type="date" class="form-control" name="validity" placeholder="Validity" value="{{isset($offer->validity) ? $offer->validity : ''}}">
</div>