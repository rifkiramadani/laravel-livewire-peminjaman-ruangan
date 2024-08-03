<div>
    <main id="main" class="main">

        <div class="pagetitle">
          <h1>Create Booking</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/bookings">Bookings</a></li>
              <li class="breadcrumb-item">Pages</li>
              <li class="breadcrumb-item active">Blank</li>
            </ol>
          </nav>
        </div><!-- End Page Title -->
    
        <section class="section">
          <div class="row">
            <div class="col-lg-6">
    
              <div class="card">
                <div class="card-body">
                        <div class="card-title">
                            <div class="row">
                                <div class="col-6">
                                    <h5 class="card-title ms-3">Form Create Booking</h5>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="user_id">User</label>
                            <div class="col-sm-10">
                              <select wire:model="user_id" class="form-select" aria-label="Default select example" id="user_id">
                                <option selected="">Select User</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                              </select>
                              @error('user_id')
                                  <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                          <div class="row mb-3">
                            <label for="booking_date" class="col-sm-2 col-form-label">Date</label>
                            <div class="col-sm-10">
                              <input wire:model.live="booking_date" type="date" class="form-control" id="booking_date">
                              @error('booking_date')
                                   <div class="text-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </div>
                          <hr>
                          @if ($booking_date)
                            <h5>Available Rooms</h5>
                            <ul class="list-group hover">
                                @foreach ($availableRooms as $availableRoom)
                                    <li class="list-group-item list-group-item-action">{{ $availableRoom->name }} | {{ $availableRoom->hotel->name }} 
                                        <button type="button" wire:click="book({{ $availableRoom }})" class="btn btn-sm btn-primary float-end">+ Book Now</button>
                                    </li>
                                @endforeach
                            </ul>
                          @endif
                    </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                      <div class="card-body">
                          <h5 class="card-title ms-3 mt-3">Booking Detail</h5>
                            @if (!empty($details))
                            <ul class="list-group hover">
                                @foreach ($details as $detail)
                                    <li class="list-group-item list-group-item-action">{{ $detail['room_name'] }}
                                        <button type="button" class="btn btn-sm btn-primary float-end">{{ $detail['date'] }}</button>
                                    </li>
                                @endforeach
                            </ul>
                            <hr>
                            <button wire:click="save" class="btn btn-sm btn-primary w-100">+ Save</button>
                        @endif
                      </div>
                    </div>
                </div>
                </section>
            </main><!-- End #main -->
        </div>
