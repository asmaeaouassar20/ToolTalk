<div {{ $attributes }} x-data="{
                           following : {{ $user->isFollowedBy(auth()->user()) ? 'true' : 'false' }},
                           verified : true,
                           followersCount: {{ $user->followers()->Count() }} ,
                           follow(){
                                axios.post('/follow/{{ $user->id }}')
                                .then(res => {
                                    this.following = !this.following
                                    this.followersCount=res.data.followersCount;
                                })
                                .catch(err => {
                                    console.log(err)   
                                    this.verified=false                                 
                                })
                           }
                        }" class="w-[320px] border-l px-8">


    {{ $slot }}
</div>