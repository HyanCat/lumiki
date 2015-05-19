<?php
/**
 * tree.blade.php
 * lumiki
 *
 * Created by HyanCat on 15/5/19.
 * Copyright (C) 2015 HyanCat. All rights reserved.
 */
?>
<div class="ui wide sidebar accordion list segment">
	@foreach($categories as $cate)
		<div class="item">
			<div class="active title">
				<i class="dropdown icon"></i>
				{{ $cate->name }}
			</div>
			<div class="active content">
				<div class="ui animated selection list">
					@foreach($cate->docs as $doc)
						<a href="{{ route('doc.show', ['id' => $doc->id]) }}" class="item {{ isset($document) && $document->id == $doc->id ? 'active' : '' }}">
							<i class="file outline icon"></i>
							<div class="content"> {{ $doc->title }} </div>
						</a>
					@endforeach
				</div>
			</div>
		</div>
	@endforeach
</div>