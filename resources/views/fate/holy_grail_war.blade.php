@extends('layouts.app')

@section('title', '聖杯戦争とは')

@section('content')

<div class="container">

<h1>聖杯戦争とは</h1>

<img class="img-thumbnail" src="{{ asset('images/fate_zero.jpg') }}" alt="聖杯戦争とは">

<h2>概要</h2>

<p>
    広義には、「あらゆる願いを叶えるとされる万能の願望機・聖杯の所有をめぐり一定のルールを設けて争いを繰り広げる争い」それら全てを聖杯戦争と呼んでいる。<br>
    狭義には、日本の冬木市で行われたものを発端とする「サーヴァントと呼ばれる英霊を使い魔として従えて戦う聖杯戦争」を指す。
</p>

<h2>基本ルール</h2>

<ul>
    <li>聖杯によって選ばれた魔術師（マスター）とそのサーヴァントが生き残りを懸けて戦う。</li>
    <li>参加条件は聖杯に選ばれ令呪を宿し、そしてサーヴァントを召喚すること。</li>
    <li>マスターは令呪を使うことで、サーヴァントに対して3回までどんな内容でも命令を強制できる。</li>
    <li>サーヴァントは必殺の武器である宝具を最少でも1つ所持している。</li>
    <li>サーヴァントとして「英霊」が召喚され、その能力に応じてクラスが割り当てられる。</li>
    <li>割り当てられるクラスは「剣士」、「弓兵」、「槍兵」、「騎乗兵」、「魔術師」、「暗殺者」、「狂戦士」の7種。</li>
    <li>クラスに対応して、それぞれ「対魔力」「騎乗」「単独行動」などといったスキルが付与される。なお、サーヴァント自体に紐づけされる固有スキルも存在する。</li>
    <li>最後まで勝ち残った1組のみ、聖杯にて望みを叶える事が出来る。</li>
</ul>

<h3>暗黙のルール</h3>

<p>基本ルールのほかに、以下のルールや暗黙の了解が存在する。</p>

</ul>
    <li>聖杯戦争に参加できるのは7名の魔術師と7騎のサーヴァント。</li>
    <li>召喚できるサーヴァントは、基本的に西洋の英霊のみ。</li>
    <li>「暗殺者」のサーヴァントだけは、歴代の「ハサン・サッバーハ」に限定される。</li>
    <li>サーヴァントを失ったマスターと、マスターを失ったサーヴァントが再契約を結ぶ事は許可されている。</li>
    <li>監視役として、聖堂教会から監督者が派遣される。</li>
    <li>神秘の秘匿のため、戦闘は夜または人目に付かない場所で行う。</li>
</ul>

<h2>冬木の聖杯戦争</h2>

<p>
    <b>遠坂・間桐・アインツベルン</b>の「始まりの御三家」によって開始された、とある魔術儀式を基にした聖杯戦争。後の派生作品に登場する聖杯戦争のほとんどはこれの模倣である。
    霊地の管理者だった遠坂が「土地」を、呪術に優れていた間桐(マキリ)が「サーヴァントの技術」を、そして錬金術と第三魔法を司るアインツベルンが「聖杯」を提供し、行われた。そのため令呪はその時の各御三家の者に優先して宿る。
</p>

<h2>歴代の聖杯戦争</h2>

<h3>第一次聖杯戦争</h3>

<p>
    元々単に儀式を成功させるだけなら参加者同士が争い合う必要はなかったため、初回ではまともなルールが規定されていなかった。<br>
    しかし参加者達は完成した聖杯の権利を独占しようと殺し合いを始めてしまい、さらに令呪のシステムすら存在しなかった為サーヴァントが制御不能になるなど大規模な混乱が発生し、儀式としての体をなさず失敗に終わる（殺し合いをしている間に終わってしまったらしい）。
</p>

<h3>第二次聖杯戦争</h3>

<p>
    令呪を始めとする細部のルールを整備して、ようやく「聖杯戦争」というシステムが機能し出す。<br>
    しかし儀式は失敗に終わる。
</p>

<h3>第三次聖杯戦争</h3>

<p>
    第二次もまた大まかな取り決めしかないルール無用の殺し合いになったため、第三次ではルールがさらに細かく決められた。<br>
    だが、開催時期が第二次世界大戦の直前にだったため帝国陸軍やナチスが介入し、帝都で戦いが繰り広げられる。<br>
    結果、「聖杯の器」が途中で破壊され、無効となった。
</p>

<p>初めて魔術協会と聖堂教会が介入し、言峰璃正を監督役として置いた。</p>

<h3>第四次聖杯戦争</h3>

<p>上記から約60年後。 <b>Fate/Zero</b></p>

<h3>第五次聖杯戦争</h3>

<p>上記から約10年後。 <b>Fate/staynight</b></p>

</div>

@endsection
