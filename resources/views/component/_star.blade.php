@for ($s = 1; $s <= 5; $s++)
    <!-- 狀態（黃色星星）加上 .ih-active -->
    <i class="{{ $s <= $star ? "ih-active" : "" }} ih-theme-star fa fa-star" aria-hidden="true"></i>
@endfor
