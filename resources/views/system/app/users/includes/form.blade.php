<div class="content-wrapper p-3">
    <div class="row">
        <div class="col-md-12">
            @if(isset($edit))
                {!! Form::open(array('route' => 'system.users.update', 'action' => 'UserController@update')) !!}
                {!! Form::hidden('id', $user->id, ['class' => 'form-control']) !!}
            @else
                {!! Form::open(array('route' => 'system.users.save', 'action' => 'UserController@save')) !!}
            @endif

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Ime i prezime</label>
                            {!! Form::text('name', $user->name ?? '', ['class' => 'form-control', 'id' => 'name', 'aria-describedby'=>'nameHelp', 'required' => 'required', isset($preview) ? 'readonly' : '']) !!}
                            <small id="nameHelp" class="form-text text-muted">Vaše puno ime i prezime</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            {!! Form::email('email', $user->email ?? '', ['class' => 'form-control', 'id' => 'email', 'aria-describedby'=>'emailHelp', 'required' => 'required', isset($preview) ? 'readonly' : '']) !!}
                            <small id="emailHelp" class="form-text text-muted">Vaša adresa elektronske pošte</small>
                        </div>
                    </div>
                </div>

                @if($loggedUser->role == 'Root')
                    <!-- Samo administrator može postaviti osobu kao partnera, kreirati korisnika i dodijeliti permisije -->
                    <div class="row">
                        @if(isset($create))
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    {!! Form::password('password', ['class' => 'form-control', 'id' => 'password', 'aria-describedby'=>'passwordHelp', 'required' => 'required']) !!}
                                    <small id="passwordHelp" class="form-text text-muted">Vaša lozinka za prijavu</small>
                                </div>
                            </div>
                        @endif
                        <div class="@if(isset($create)) col-md-6 @else col-md-12 @endif">
                            <div class="form-group">
                                <label for="role">Nivo permisija</label>
                                {!! Form::select('role', ['User' => 'Korisnik', 'Moderator' => 'Moderator', 'Root' => 'Root Administrator'], $user->role ?? 'user', ['class' => 'form-control', 'id' => 'role', 'aria-describedby'=>'roleHelp', 'required' => 'required', isset($preview) ? 'disabled => true' : '']) !!}
                                <small id="roleHelp" class="form-text text-muted"> Nivo permisija za pristup admin panelu ! </small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="partner"> Partner </label>
                                {!! Form::select('partner', ['No' => 'Ne', 'Yes' => 'Da'], $user->partner ?? 'No', ['class' => 'form-control', 'id' => 'partner', 'aria-describedby'=>'partnerHelp', isset($preview) ? 'disabled => true' : '']) !!}
                                <small id="partnerHelp" class="form-text text-muted"> Ukoliko je korisnik partner, prikazuju se veleprodajne cijene </small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="discount"> Popust </label>
                                {!! Form::number('discount', $user->discount ?? '', ['class' => 'form-control', 'id' => 'discount', 'aria-describedby'=>'discountHelp', 'required' => 'required', isset($preview) ? 'readonly' : '']) !!}
                                <small id="discountHelp" class="form-text text-muted"> Dodatni popust koji se obračunava na MPC ili VPC </small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="default_shipping"> Standardna dostava putem pošte </label>
                                {!! Form::select('default_shipping', ['Yes' => 'Da', 'No' => 'Ne'], $user->default_shipping ?? 'Yes', ['class' => 'form-control', 'id' => 'default_shipping', 'aria-describedby'=>'default_shippingHelp', isset($preview) ? 'disabled => true' : '']) !!}
                                <small id="default_shippingHelp" class="form-text text-muted"> Ukoliko korisnik želi dostavu definisati na drugi način, izaberite Ne </small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="status"> Status korisnika </label>
                                {!! Form::select('status', $status, $user->status ?? 'Yes', ['class' => 'form-control', 'id' => 'status', 'aria-describedby'=>'statusHelp', isset($preview) ? 'disabled => true' : '']) !!}
                                <small id="statusHelp" class="form-text text-muted"> Status korisnika </small>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone">Broj telefona</label>
                            {!! Form::text('phone', $user->phone ?? '', ['class' => 'form-control', 'id' => 'phone', 'aria-describedby'=>'phoneHelp', isset($preview) ? 'readonly' : '']) !!}
                            <small id="passwordHelp" class="form-text text-muted"> Broj telefona unesite u formatu (00)387 XX XXX - XXX</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address">Adresa</label>
                            {!! Form::text('address', $user->address ?? '', ['class' => 'form-control', 'id' => 'address', 'aria-describedby'=>'addressHelp', 'required' => 'required', isset($preview) ? 'readonly' : '']) !!}
                            <small id="addressHelp" class="form-text text-muted">Vaša trenutna adresa boravišta</small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="postal_code">Poštanski broj</label>
                            {!! Form::number('post_code', $user->post_code ?? '', ['class' => 'form-control', 'id' => 'postal_code', 'aria-describedby'=>'', 'min' => '0', isset($preview) ? 'readonly' : '']) !!}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="city">Grad</label>
                            {!! Form::text('city', $user->city ?? '', ['class' => 'form-control', 'id' => 'city', 'aria-describedby'=>'', isset($preview) ? 'readonly' : '']) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="country">Država</label>
                            {!! Form::select('country', ['0' => 'BiH', '1' => 'Croatia'], $user->country ?? '', ['class' => 'form-control select-2', 'id' => 'country', 'aria-describedby'=>'', isset($preview) ? 'disabled => true' : '']) !!}
                        </div>
                    </div>
                </div>

                @if(!isset($preview))
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button type="submit" class="btn btn-sm btn-secondary">Ažurirajte informacije</button>
                        </div>
                    </div>
                @endif
            {!! Form::close(); !!}
        </div>
    </div>
</div>
