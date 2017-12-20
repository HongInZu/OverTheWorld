<button type="button" class="ih-theme-favorite ih-button">
    收藏

    @if ($status)
        <!-- 已收藏 -->
        <i class="ih-active fa fa-heart" aria-hidden="true"></i>
    @else
        <!-- 未收藏 -->
        <i class="ih-theme-hover-scale fa fa-heart-o" aria-hidden="true"></i>
    @endif
</button>
