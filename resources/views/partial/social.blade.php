@if (isset($pintrest) || isset($linkedin) || isset($twitter) || isset($facebook))
<div class="share">
    <hr />
    <h4>Share Me!</h4>
    @if (isset($pintrest))
    <a target="_blank" class="pintrest" href="{{{ $pintrest }}}">Pinterest</a>
	@endif
	@if (isset($linkedin))
    <a target="_blank" class="linkedin" href="{{{ $linkedin }}}">LinkedIn</a>
    @endif
	@if (isset($twitter))
    <a target="_blank" class="twitter" href="{{{ $twitter }}}">Twitter</a>
    @endif
	@if (isset($facebook))
    <a target="_blank" class="facebook" href="{{{ $facebook }}}">Facebook</a>
    @endif
</div>
@endif