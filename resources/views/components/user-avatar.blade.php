@props(['user' , 'size'])

@if($user->image)
                        <img src="{{ $user->imageUrl()}}" alt="user image" class="{{ $size }} rounded-full" />
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}" alt="user avatar"
                            class="{{ $size }} rounded-full" />
                    @endif