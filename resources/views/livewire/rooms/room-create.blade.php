<div>
    <main id="main" class="main">

        <div class="pagetitle">
          <h1>Add Rooms</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/rooms">Rooms</a></li>
              <li class="breadcrumb-item">Pages</li>
              <li class="breadcrumb-item active">Blank</li>
            </ol>
          </nav>
        </div><!-- End Page Title -->
    
        <section class="section">
          <div class="row">
            <div class="col-lg-12">
    
              <div class="card">
                <div class="card-body">
                        <div class="card-title">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="card-title ms-3">Form Add Room</h5>
                                </div>
                            </div>
                        </div>
                    <form wire:submit.prevent="create">
                        <div class="row mb-3">
                          <label for="name" class="col-sm-2 col-form-label">Name</label>
                          <div class="col-sm-10">
                            <input wire:model="name" type="number" class="form-control" id="name">
                            @error('name')
                                 <div class="text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="hotel_id">Hotel</label>
                          <div class="col-sm-10">
                            <select wire:model="hotel_id" class="form-select" aria-label="Default select example" id="hotel_id">
                              <option selected="">Select Hotel</option>
                              @foreach ($hotels as $hotel)
                                  <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
                              @endforeach
                            </select>
                            @error('hotel_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="room_type_id">Room Type</label>
                            <div class="col-sm-10">
                              <select wire:model="room_type_id" class="form-select" aria-label="Default select example" id="room_type_id">
                                <option selected="">Select Room Type</option>
                                @foreach ($room_types as $room_type)
                                    <option value="{{ $room_type->id }}">{{ $room_type->name }}</option>
                                @endforeach
                              </select>
                              @error('room_type_id')
                                  <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="price_per_night" class="col-sm-2 col-form-label">Price Per Night</label>
                            <div class="col-sm-10">
                              <input wire:model="price_per_night" type="number" class="form-control" id="price_per_night">
                              @error('price_per_night')
                                   <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                        <div class="row mb-3">
                          <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary float-end">+ Add</button>
                          </div>
                        </div>
                      </form>
                </div>
              </div>
            </div>
          </div>
        </section>
    
      </main><!-- End #main -->
</div>
