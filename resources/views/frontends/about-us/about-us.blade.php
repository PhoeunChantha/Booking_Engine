@extends('frontends.master')

@section('content')
    <section class="chaufea-section home-description">
        @if (request()->routeIs('about-us'))
            @php
                $titles = App\Models\SectionTitle::where('page_id', 8)->get();
            @endphp
        @endif
        <h2 class="chaufea-heading-1 text-uppercase">
            {{ $company_name }} </h2>
        <div class="mt-3 mt-md-5">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-6">
                    <div>
                        <p>{!! $company_description !!}</p>

                    </div>
                    <div class="mt-3 mt-md-5">
                        <div class="d-flex">
                            <div style="width:60px;"></div>
                            <p class="text-muted ml-4 mb-0">{{ __('Reservation') }}</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <mask id="mask0_358_25352" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0"
                                    width="80" height="80">
                                    <rect width="60" height="60" fill="url(#pattern0)"></rect>
                                </mask>
                                <g mask="url(#mask0_358_25352)">
                                    <rect width="60" height="60" fill="#CF6737"></rect>
                                </g>
                                <defs>
                                    <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1"
                                        height="1">
                                        <use xlink:href="#image0_358_25352" transform="scale(0.0078125)"></use>
                                    </pattern>
                                    <image id="image0_358_25352" width="128" height="128"
                                        xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIAAAACACAYAAADDPmHLAAAKqmlDQ1BJQ0MgUHJvZmlsZQAASImVlwdQk9kWgO//pzdaQgSkhN6ktwBSQmihCNLBRkgChBJiIKjYEXEF1oKKCNjQBREF1wLIIiKi2BYFBbsLsggoz8WCDZX3A0PYMu+9eWfmzPnu+c8999w7/505FwCKAlcsToEVAEgVZUhCfDwYUdExDNwgwAMSIAMAaFxeupgVHByAMJixf5UPPQCatHfNJnP98/t/FUW+IJ0HABSMcBw/nZeK8FlEX/LEkgwAUIcQv+6KDPEkt03WI0EKRPjBJCdM88gkx00xGkzFhIWwEaYBgCdzuZIEAMgMxM/I5CUgecjuCFuK+EIRwmKEXVNT0/gIn0LYCIlBfOTJ/My4P+VJ+EvOOFlOLjdBxtN7mRK8pzBdnMJd9X8ex/+W1BTpzBoGiJITJb4hiFVCzuxBcpq/jEVxC4JmWMifip/iRKlv+Azz0tkxM8znevrL5qYsCJjheKE3R5YngxM2w4J0r9AZlqSFyNaKl7BZM8yVzK4rTQ6X+RMFHFn+rMSwyBnOFEYsmOH05FD/2Ri2zC+RhsjqF4h8PGbX9ZbtPTX9T/sVcmRzMxLDfGV7587WLxCxZnOmR8lq4ws8vWZjwmXx4gwP2VrilGBZvCDFR+ZPzwyVzc1AfsjZucGyM0zi+gXPMGCDNJCCqAQwQAAy8gQgQ7AyY3Ij7DTxKokwITGDwUJumIDBEfHM5zGsLa1tAJi8r9O/wzv61D2E6DdmfdlPAXCJnpiYaJr1BSDncXYIAOLIrM+wGgBKMwDXNvOkksxp39RdwgAikAc0oAo0gS4wAmbAGtgDZ+AOvIAfCAJhIBosBTyQCFKRyleANWAjyAX5YAfYA0rAQXAEHAMnwWlQD5rAJXAV3AR3QDd4DHrBAHgFRsEHMA5BEA6iQFRIFdKC9CFTyBpiQq6QFxQAhUDRUCyUAIkgKbQG2gTlQ4VQCXQYqoJ+hs5Dl6DrUCf0EOqDhqG30BcYBZNhGqwBG8AWMBNmwf5wGLwEToCXw1lwDrwNLobL4RNwHXwJvgl3w73wK3gMBVAkFB2ljTJDMVFsVBAqBhWPkqDWofJQRahyVA2qEdWOuovqRY2gPqOxaCqagTZDO6N90eFoHno5eh26AF2CPoauQ7eh76L70KPo7xgKRh1jinHCcDBRmATMCkwupghTgTmHuYLpxgxgPmCxWDrWEOuA9cVGY5Owq7EF2P3YWmwLthPbjx3D4XCqOFOcCy4Ix8Vl4HJx+3AncBdxXbgB3Cc8Ca+Ft8Z742PwInw2vgh/HN+M78IP4scJCgR9ghMhiMAnrCJsJxwlNBJuEwYI40RFoiHRhRhGTCJuJBYTa4hXiE+I70gkkg7JkbSQJCRtIBWTTpGukfpIn8lKZBMym7yYLCVvI1eSW8gPye8oFIoBxZ0SQ8mgbKNUUS5TnlE+yVHlzOU4cny59XKlcnVyXXKv5Qny+vIs+aXyWfJF8mfkb8uPKBAUDBTYClyFdQqlCucV7iuMKVIVrRSDFFMVCxSPK15XHFLCKRkoeSnxlXKUjihdVuqnoqi6VDaVR91EPUq9Qh2gYWmGNA4tiZZPO0nroI0qKynbKkcor1QuVb6g3EtH0Q3oHHoKfTv9NL2H/mWOxhzWHMGcrXNq5nTN+agyV8VdRaCSp1Kr0q3yRZWh6qWarLpTtV71qRpazURtodoKtQNqV9RG5tLmOs/lzc2be3ruI3VY3UQ9RH21+hH1W+pjGpoaPhpijX0alzVGNOma7ppJmrs1mzWHtaharlpCrd1aF7VeMpQZLEYKo5jRxhjVVtf21ZZqH9bu0B7XMdQJ18nWqdV5qkvUZerG6+7WbdUd1dPSC9Rbo1et90ifoM/UT9Tfq9+u/9HA0CDSYItBvcGQoYohxzDLsNrwiRHFyM1ouVG50T1jrDHTONl4v/EdE9jEziTRpNTktilsam8qNN1v2jkPM89xnmhe+bz7ZmQzllmmWbVZnzndPMA827ze/LWFnkWMxU6LdovvlnaWKZZHLR9bKVn5WWVbNVq9tTax5lmXWt+zodh426y3abB5Y2tqK7A9YPvAjmoXaLfFrtXum72DvcS+xn7YQc8h1qHM4T6TxgxmFjCvOWIcPRzXOzY5fnayd8pwOu30h7OZc7Lzceeh+YbzBfOPzu930XHhuhx26XVluMa6HnLtddN247qVuz1313Xnu1e4D7KMWUmsE6zXHpYeEo9zHh/ZTuy17BZPlKePZ55nh5eSV7hXidczbx3vBO9q71EfO5/VPi2+GF9/352+9zkaHB6nijPq5+C31q/Nn+wf6l/i/zzAJEAS0BgIB/oF7gp8skB/gWhBfRAI4gTtCnoabBi8PPiXhdiFwQtLF74IsQpZE9IeSg1dFno89EOYR9j2sMfhRuHS8NYI+YjFEVURHyM9Iwsje6MsotZG3YxWixZGN8TgYiJiKmLGFnkt2rNoYLHd4tzFPUsMl6xccn2p2tKUpReWyS/jLjsTi4mNjD0e+5UbxC3njsVx4sriRnls3l7eK747fzd/WOAiKBQMxrvEF8YPJbgk7EoYTnRLLEocEbKFJcI3Sb5JB5M+JgclVyZPpESm1KbiU2NTz4uURMmitjTNtJVpnWJTca64d7nT8j3LRyX+kop0KH1JekMGDWmMbkmNpJulfZmumaWZn1ZErDizUnGlaOWtVSartq4azPLO+mk1ejVvdesa7TUb1/StZa09vA5aF7eudb3u+pz1Axt8NhzbSNyYvPHXbMvswuz3myI3NeZo5GzI6d/ss7k6Vy5Xknt/i/OWgz+gfxD+0LHVZuu+rd/z+Hk38i3zi/K/FvAKbvxo9WPxjxPb4rd1bLfffmAHdodoR89Ot53HChULswr7dwXuqtvN2J23+/2eZXuuF9kWHdxL3Cvd21scUNywT2/fjn1fSxJLuks9SmvL1Mu2ln3cz9/fdcD9QM1BjYP5B78cEh56cNjncF25QXnREeyRzCMvjkYcbf+J+VNVhVpFfsW3SlFl77GQY21VDlVVx9WPb6+Gq6XVwycWn7hz0vNkQ41ZzeFaem3+KXBKeurlz7E/95z2P916hnmm5qz+2bJz1HN5dVDdqrrR+sT63obohs7zfudbG50bz/1i/ktlk3ZT6QXlC9ubic05zRMXsy6OtYhbRi4lXOpvXdb6+HLU5XttC9s6rvhfuXbV++rldlb7xWsu15quO10/f4N5o/6m/c26W3a3zv1q9+u5DvuOutsOtxvuON5p7Jzf2dzl1nXprufdq/c49252L+ju7AnveXB/8f3eB/wHQw9THr55lPlo/PGGJ5gneU8VnhY9U39W/pvxb7W99r0X+jz7bj0Pff64n9f/6vf0378O5LygvCga1BqsGrIeahr2Hr7zctHLgVfiV+Mjuf9S/FfZa6PXZ/9w/+PWaNTowBvJm4m3Be9U31W+t33fOhY89uxD6ofxj3mfVD8d+8z83P4l8svg+IqvuK/F34y/NX73//5kInViQsyVcKdaARSicHw8AG8rkT4hGgDqHaR/WDTdT08JNP0GmCLwn3i6554SewBqEDPZFrFbADiFqMEGJDcynmyJwtwBbGMj05ned6pPnxQs8mI55DpJ3Sqx/3iTTPfwf6r77xZMZrUFf7f/Bng9Br406oxSAAAAOGVYSWZNTQAqAAAACAABh2kABAAAAAEAAAAaAAAAAAACoAIABAAAAAEAAACAoAMABAAAAAEAAACAAAAAAGtGJk0AABIxSURBVHgB7ZwHtB1FGccJNUBoQUAgQOiIdJEqVSHUQ5dOBJEjIKCIEEGKFKVIU8BISyI9SAApUiSho6j00AwkQChJgNADIaC//4PlTPbtlL07u/fuffc75393d+abr87ulN33ZpihQ+kILE/BCDARvAquBQeDFUGH2jwC/fDvdfA/CyZQPhwcCL4BOtRmETgdf2zJzyp/A/6rwQFgPtChmkfgDuzPSnRI2Ye0vQisWvMY9Gjzh+F9SLJ9PPchZ1cwS4+OZg2dXxebPwO+BIfWv4asE8DCoEM1icBu2PkmCE1yCN9U5GmusBZoKepVkjUrIXcdsAiYHyiguhseBM+AVqfZMHAA2BRsDFYBMWKlznIJOAq8DdqKZsKbw8HzwHVXqAMcAmIEFDGVUF+0bA/OBY+Dz4HLR1+d9hj2Bm1Dy+KJ7m6f42b93+HXuruOpKfaDmAweA+YfuU5v4u2y4Haku7iQ8FHII/jCa8egxpz60xzYfxBYDRI/Mpz/Jh2JwANO7WiPlhbZN1sBknjooaQupPmDCPANGD6F3L+HG3UvhY0J1beC0IcC+W5Cnnt0AmUwMXAKUBjfaj/Cd+FtJkVtCwp+feAxOCYx+HInbllPc9vmB7rh4G884RRtGnJreU5MEzGhSZdY/zdYHKONn+Bt9120BbFp+tyxEDxfRYsDVqGlPyRICT5T8O3PkiWenq0a5ftYRDS/nr42q0T4NIM24CXQEgMxDMJrAeaTrNjgZYsIYbrhYj4s0iPxEtBiJwb4WvHTqAh9AzwaWActEpo6kpJydSaPSRpZ8PnIz0Vzgch8jQctNOcwIzNqlz8IzAO2ng6xmxc1XlvFIUu9UKSb9p9HhchnaCdVgem/zqfERwLQncWh8Bb2VNRyb8dhCQpb/IR20W/5zdE/uXwtcsS8QvPp//VI34KCInFbfCV3gm0DpWiEIMaTT7iu+gcfkP0tHsn0CR5YmAsLu6KXIk/oRO1oslPXOh0gi8isSQHraBCbohBSfBiH48MNCBW8hP7QyeG7f4kmJeAhEy6NW/YJQlerONmCPoM+Hpg7OTLfq0OtA3q0636sjrBPMjWu/pbwM3gaKB1eOljLjpMkj4tp32x0LxhHbNhkXMpfRb4lJaR/MRudYLQ4Sd2J5gb3Y9Y/P+Acs2J1DnWBFXRr1Hky8cEeDR0FKYjkOBTprG6bNLSqBmdQMsxn/9J/RPwHgC0O1o2DUFBotd21LxBQ0fDpN7/LrApUPlIoORUQXk6wZBIBt2HHJf/WXWTaXMWKHPPXk/mUQG2ad7Q8FC1n0fB29T3A1VSnk6gu7co3YmArCSHlGlCpq3rZYoaYWmvN4Mhw/N5lvbeYl8Piz7b9Fr0BUOeTrBDoEwb2/5UhCTbxaNJ2XGgjPf5esro5ZBLvzqiJq25aFG41dAmeEQuafGZQzvBy6i2vYQKsUp6hgBbHPKU627dJERpTp7vwP8xcNnyJPUz55GrO8clcO88wkriDe0EMYaC1fDhJPAAmApcsfHVDaN9ockZ7dO0JwU+vVqtBNOv4HQJ1BOiFUid4ArgsvU16sUXi/TqdgA4DejOcum21WmGHmWZhpyETuTEpk/lH4L+IIj0ts0mTB8qthLpEa8lmM1elW9UosEbIPsa8Clw2ZCumwD/2iAWzYSgR0Faj3mtzawgehAus6F5/scgCdUyLYc6VwJOrsCcRdChu9A3KTNj+RH8O0e0bS1kfQZMHenzIH2ujxJijKkRff5KlKvTDv2Kq/yTvqi4GLgm0WZSxHdkRLO07DPlp89fpV57PE5ydYBBzpbNqzwd1Wlnk+vbmmDWhujUWJ/Y4DseEclGJVfzHpc+fXPhJFcHiGWo04AGKl1f2A5vQF6MJrMi5HjgeywrWXoS7AhikPZoXB1A9qzkUuTqAIe7GjapToF+C9icruJ9hcv1ban8wGFfYrfmBBrHY9CtCEnkZh0vdClxdQA9aluN9EjLcjIpG9gCBq+ODRp/E5tsxzfg6Q+KkpaZWvrZ9KjOuh+h5YKt4dXUtRLtijE2W1X+CdA7/VYg7Z/4lmqyeTSIYfMvkeOKjfVpfrajoWbbrUJbYIhvG1SfkbcSzYUxjwFXYlR3UQSj+yDjXYeuMdT1ytJzoKPR61kNmlAWknztDazQBNt8KvUkGA9cnUCTQu3zF6VzEeDSs2WWgk09jZod1K2wz3fny2k536q0Goa9D1zJeYr6WQo6sBzt1ZlsejTcd6N+lNgaqNw6dnSTFL9gO0RqXHfZp7qHQG/QyrQ1xk0DLl+OjuCA9kFsOtQ5un28onFBH3zYGt1JXTNoF5TqsW6zKyl/EZ4Fm2FgAzqP9/ijpeFSDcg1m6ijJbHJOp5pMifnrhdCugM1waiS9kSZ726Rc6+BZao0rKAu7WE8C7ISk5RdV1DHjLR/waFDN/scaR0KeGJA1lGP4qpoXxSF7KbpDVuz5yeNxGQTGmXFOCmT7/0bEWy00bCdyMs66uk6Hem/XrnuuMHTcZd38WNEuyYxiTNKvnN7szwTo0gehpTEl6zjaQW1aNPnQ4eOC7Lk3+9o8FJWg8hlhzr0m0HS0nTFyLqrFrcACicD0y/z/E3qZi9o1FCH/KezZA9yNJBx38xqFKlsS+SE3PnaXl0+ks5mizkDA8ykp8/3K2jgXh75C6Xl65GaNsK8PjLdINJ1X+RM9OiWHa+AOk34MNdJS1Lrmus84mztr1wMFjN/6XNtq3ejcZSkGZNrzV57dWtRvEA9PdFhO46DRwFrN/orDtl8VvkqBR1+wSG/a16nJYNJt5gXqXM9ejdLlcW4XMMjROv8jcBYD18dq8/zGL2Jp95XfY+DYeOsOil09cibshoVLPO9xar7hM8Vnl5UjgG2mF/vahxQN9AhWzoXzpIx2tFIY9ZSWY0KlO3u0Ccj9Y1+O5OeArYO8BZ16iSN0hI0tMlWuWLfjQ6kxNUocyuxm5Twgn6wfuLQqfVsZk8NV9HSnDs5fFceis4Dxjnk/4m6bjQnJe8AWyfQ+rXbVmI3KfkKXHeB7HB+0pRPVctxfw2LXEtg7Y8UoWE0tuVS3ypk0lmU2hqp/IDMVo0X6jv7KcCmU7uU7TwXeNzh+5XUFSHXfoD0ZpJeGbrWqE9mtipW6Ot0WjK1K2lYtXX+4QWdnpn2z1jkazPKSjdTYzNK5TtYWzZWsSDNNN67dGq8bEfSPMjmu96PFKUtEDAVmLH9D9fahLPSAGrMBulz9aqZrK0bqzjVo1OzYgWrHek4nErH+B7KekdyVnONg8AVYH+guZ6TtPzQ7l/aKPNagmLS/Ah7D5g60ucjqU9vYMW0oZmyvo1yfdp2O/gJiD3ZRmQ+Ggh7OgHm9Xjqi761Slv0c49O6T8q3ahzXU4EdKc9Acykp89jJ0NPnrs8OjWefQt0qIIIbI2OdNLNa+0LzBfZjkWRp/He1JM+f4567zgW2a4eK06TkXQCzOvTS4jMzh6d0n8daNf5QAkhbVzkOjQ1E54+n0J9GbPzSz16Zcc5oEMVRGAEOtKJN6+LvrnKcqEPhWM8emXDT7Mad8riRmAFxE0DZtLT57vFVdklbW1+fX8foF3Ldt0kKiGkjYvUS5l00s3rSdRrRy82DUKgqSfrXMPQerEVd+RNH4FFuHwfZCUgKbt2+ibRrkLmA/qadtloGjuCMiPg+15AHUEz+Ng0CwLvBElHsx3HwbMk6FBJEdBGzShgS4DKJwDtPcemuRHo25iS/pdA7C+XYvtSa3kKru3tVdIxrirJQy03XwWJHtux3T4jLymcjYs9LCAJ2zcu3tlyNWp9L43UMfSuojMncIay8UrtwN0PbHegyrUqWAyUQXrH7VseygY9LZr110Qzo3tzcD7Q/EVvV58HetcxGMgH8dSWlsNyLb9cneCf1M9akod7INe3NyHbXgd6alRJe6FMN4ArNqoTz89AbTvCLwKcvACeskibTyGd4AP4tivLCEOuXoxdDXyJT9ePps3qhpzanOqrIN3laYfS17ojyqJdEBwyHGjH8KiyjEDupkCTz7TvodfqpNuA2pEmWu8Cl6MfUr9yiZ5pKzikE8jGoSD2sKQ/nv0cuGIQUqen2b6gdrQDFvsc1ARIa/mySDZMBT47VH8fiLVXEbJVHWJTwqMn1Q9A7eg0LE6csB31VrFM0jj/CbDpN8vHwbchKEKxk5/Yp04wsIhhzWir+cBIkDhhO2riWCZtgPCQGbjsU6DVcRsZEkKTr6HhYXAiOAX8G4QMF7JtH1Ar0tvA8cCWfJVrnNsWlEl6H/AUcNlh1j0G70o5DApN/ovIzJrdb0T5RGDakHVey06wHo75xmLtHygIZZLmG7eArMBmlX0M7+FA7ztcFJp8zTP6OgT1p24syLLFLFMn2BvUig7BWtOJrHOtHNYo2SsNS2cF2GLap8StbbErNPn30r6PRYZZvAQXY4GpP+tcnaDMpbRpU7TzKwMc02Owiq3a/dHjeyqlA68Jq76ESih28hO5S3AyFqT1p681dO6ZNKrDcU6MfBKkHUlf6/XtYhU4tCY6ng2wx7RPQb8EnBzY7h745HdeWoIGY4GpO+tc9uyRV3gz+fuhfBzIcsYsewaeWOtyRFlpdmrOA6buWOd3I7eR5NOsixbnV5NGnz3qBLt3tajJj3YKJwCfY1oezVWRTwPQ82qATT6bk/q7kVUk+TTvojydYLekUR2OWgq9A5KA2Y6j4OldkUOaoQ8PsMlma1Ium+eIaHOeTrBrRL2li9oADR+BJHC24w3wVPl6VI/TlwPsyrI3dvIxo4vUCV4AWTrNMg0H3+9qUZOfrbEz5KXNn+HTEq4q0lPnKBDylEoSMBL+mHd+2ldNjEM6geKpN6K1Ic1iPwdJIG1HbeKErKVjOj4/ws4AvifV7fCUmfzEp7btBAfjoS3xZvkj8C2cRKPC4yLoGgzSfwfxHmW/A1UOUXk6gSa3taFjsdRMtu1c+wQrNcmrWdC7HjgUbACqTDzqviJ1gjHAFqOkXLurzYrVV8bmOTk7wCk5p7H5u3kEtyGv9lRCOoF4qlpJFQ6zXrwMAUkPdh2nwjewsMZ6CwjtBMfUyU11Ao2rruSbdSfUybkSbA3pBB+gt4qd1ajuaWI4DZjJtp0Pg0/jc08lzQkmAVt8VP6jOgZHH4qo97ocS+rugm+eOjoZyeYtkONaTmupWktaE6vfAEmiXccX4NMsvafSUBy3xWdynYPSH+OfdjhnOq1h4yTQE4cEbQObsUif96G+tjQvlo8Caads1/+Ct4qPS1opoCt44rNkKxnbiC36Wvdyj5Nmh9AWriaTPYX2wFHT//R5rZ8AZhJP9jiadvxv8DdjC9m0uYrzyxxx0bZ1W9EP8eZjkE627fpNeHdsqwhM78zmXLpWAbdOz94eVyvjxhPAlvSs8iHwV/WlUVVRXhBFr3nioBumLWk2vDoTuHp/uiOMg79W78yx10ZKvu9jW32Cp0l0W9OmePcKSCfbdf0Q/OvXOCoLYfvoAJ/1N5I9gubDy6uBK+lZddfRZtmaRejr2Pt0gK9Da+ZXFHP3REqez7nUKfR28Q+gDi9NFsDOkOS/BN/coEfS4nh9N8i6411l+ohiEOgNWpH6YtRjwOWD6rQjqmGxR9OMeH8k+AT4Apauf5k2ewO9nm4V0t2sHc60relrJV9PwQ59GYHVON4P0oEKuX6Udtph0y5kM2lOlD8AfDZ3ku/IkjaCng8IYlaQJ9Lut6A/qJr0J2yjQJZdZlkn+QGZ0VvCQ8CkgICawU3OP6PdzWAroCGmbNKdfwdI9NuOsmuvso1pJ/n6eORUMAXYguorH0tb/QGJZuVlkOQ+DHx2aBOsbXf6ygisKVOrhctAnp3EdEL0TuIaMBDEeun0PWSNAWldWdcHwdehghFYg/YjQVaA85bp/cQZYDOQZx2uIWVdcBMI1Xk4vFGolZY7URxqUMg2tDsNrNhg+6xmEynU3fzfL6Fz7TfoPYYe89rP18ccW3x5zSGIjoHrN0GcHaZcEdDNMADcAKaB0LuxSr7jsKtDFURgUXScAMaDKhNs06UOuT/oUMURmAl924PbQZEJoy2xIeX6RH5r0KEmR2Ap9GueoLE9JHExeDRBXRl0qIUioO3hncBFYCyIkei0jOeQ22Pe5+NrrWkZrD8QjACTQTqZodcf0fZGsA/QzmUl1FkGxg2z4qkJpDqFsLRx7M+5PtHW9u0EA+M5vxNonqFOUCn9H3RaPHeJ7b8NAAAAAElFTkSuQmCC">
                                    </image>
                                </defs>
                            </svg>
                            <p  class="ml-4 chaufea-text-1 font-weight-bold mb-0"><a style="color:#CF6737" href="tel:{{ $phone }}">{{ $phone }}</a></p>
                        </div>
                    </div>

                </div>
                <div class="col-12 col-md-12 col-lg-6">
                    <div class="owl-carousel owl-theme home-gallery-slider mt-4 mt-md-2 mt-lg-0">
                        @foreach ($sliders as $slider)
                            <div class="item">
                              <div class="">
                                  <img class="image-slider-chaufea" src="{{ $slider->image_url }}" alt="">
                              </div>
                              {{-- <div class="slider-chafea-title text-center">
                                  <p class="mb-0 text-white">{{ $slider->name }}</p>
                                  <p class="mb-0 text-white">{{ $slider->short_des }}</p>
                              </div> --}}
                            </div>
                        @endforeach
                    </div>
                    {{-- <div class="row">
                        <div class="col-md-6 p-4">
                            <a href="{{ asset('uploads/business_settings/' . $image1) }} ">
                                <img class="home-gal-img-1" src="{{ asset('uploads/business_settings/' . $image1) }} "
                                    alt="">
                            </a>
                        </div>
                        <div class="col-md-6 p-4">
                            <a href="{{ asset('uploads/business_settings/' . $image2) }} ">
                                <img class="home-gal-img-2" src="{{ asset('uploads/business_settings/' . $image2) }}"
                                    alt="">
                            </a>
                        </div>
                        <div class="col-md-6 p-4">
                            <a href="{{ asset('uploads/business_settings/' . $image3) }}">
                                <img class="home-gal-img-3" src="{{ asset('uploads/business_settings/' . $image3) }} "alt="">
                            </a>
                        </div>
                        <div class="col-md-6 p-4">
                            <a href="{{ asset('uploads/business_settings/' . $image4) }}">
                                <img class="home-gal-img-4" src="{{ asset('uploads/business_settings/' . $image4) }}"
                                    alt="">
                            </a>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
    <section class="chaufea-section extra-service-section">
        <h2 class="text-white chaufea-heading-1">{{ $titles[0]->title?? $titles[0]->default_title }}</h2>
        <div class="row mt-3 mt-md-5">
            <div class="col-12 col-md-12 col-lg-5">
                <div class="pb-0 pb-md-5">
                    <p>
                        {!! $extra_service_description !!}
                    </p>
                </div>
                <div class="mt-5">
                    <div class="d-flex">
                        <div style="width:60px;"></div>
                        <p class="text-muted ml-4 mb-0">{{ __('For Information') }}</p>
                    </div>
                    <div class="d-flex align-items-center">
                        <svg width="60" height="60" viewBox="0 0 60 60" fill="none"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <mask id="mask0_358_25352" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0"
                                width="80" height="80">
                                <rect width="60" height="60" fill="url(#pattern0)" />
                            </mask>
                            <g mask="url(#mask0_358_25352)">
                                <rect width="60" height="60" fill="#CF6737" />
                            </g>
                            <defs>
                                <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1"
                                    height="1">
                                    <use xlink:href="#image0_358_25352" transform="scale(0.0078125)" />
                                </pattern>
                                <image id="image0_358_25352" width="128" height="128"
                                    xlink:href="data:image/png;base64,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" />
                            </defs>
                        </svg>
                        <p  class="ml-4 chaufea-text-1 font-weight-bold mb-0"><a style="color:#CF6737" href="tel:{{ $phone }}">{{ $phone }}</a></p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-12 col-lg-7 mt-5 mt-md-2 mt-lg-0">
                <div class="owl-carousel owl-theme extra-service-carousel">
                    @foreach ($extra_services as $extservice)

                        <div class="item px-2">
                            <div class="extra-service-wrap">
                                <img src="{{ asset('uploads/service/' . $extservice->thumbnail) }}" alt="extra-service">
                                <div class="extra-service-detail">
                                    <h3 class="">{{ $extservice->title }}</h4>
                                        <p class="text-dark"><span
                                                class="special-service-price">${{ number_format($extservice->price, 0) }}
                                            </span>/day
                                        </p>
                                        <ul class="features mb-4">
                                            @foreach ($extservice->description as $item)
                                                <li class="feature">
                                                    @if ($item['option'] == 'yes')
                                                        <img src="{{ asset('uploads/mdi_tick.svg') }}" alt="">
                                                    @else
                                                        <img src="{{ asset('uploads/teenyicons_x-outline.svg') }}"
                                                            alt="">
                                                    @endif
                                                    <span>{{ $item['title'] }}</span>
                                                </li>
                                            @endforeach
                                        </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="chaufea-section facilities-section">
        <h2 class="chaufea-heading-1 text-uppercase">{{ $titles[1]->title??$titles[1]->default_title }}</h2>
        <div class="row">
            <div class="col-12">
                <p>{!! $history_of_chaufea !!}</p>
            </div>
        </div>
        {{-- <div class="row">
            @foreach ($facilities as $facility)
                <div class="col-sm-6 col-md-4 p-3">
                    <div class="chaufea-facility-wrap pt-3 pl-3 pr-3">
                        <div class="chaufea-facility-bg"
                            style="background-image: url('{{ asset('uploads/facility/' . $facility->image) }}');"></div>
                        <div class="chaufea-facility-content">
                            <div class="mb-2">
                                <img class="fa-image" src="{{ asset('uploads/facility/' . $facility->image) }}"
                                    alt="facility">
                            </div>
                            <div>
                                <h4 class="mb-2">{{ $facility->title }}</h4>
                                <p class="text-muted">
                                    {{ $facility->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div> --}}
    </section>
@endsection
