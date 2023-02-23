@props(['url'])
<tr>
<td class="header">
<h2 class="h2class">Comisión EmPrenDe</h2>
<br>
<a href="https://res.cloudinary.com/dm0qsdpr8/image/upload/v1676925274/emprende/Logo-EmPreNde---ESFOT_ftiitm.png" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<!-- <img src="https://res.cloudinary.com/dm0qsdpr8/image/upload/v1676925277/emprende/Logo-EmPreNde-HQ_o7bmbn.png" class="logo" height="70" width="90">
<br>
<img src="https://esfot.epn.edu.ec/images/headers/logo_esfot_buho.png" class="logo" height="70" width="90">
<br> -->
<img src="https://res.cloudinary.com/dm0qsdpr8/image/upload/v1676925274/emprende/Logo-EmPreNde---ESFOT_ftiitm.png" class="logo" height="70" width="90">

@else
{{ $slot }}
@endif
</a>
</td>
</tr>
