<div class='slider'>
    <img src="/application/views/images/news/BigData-Header.jpg" alt="">
</div>
<div class="main-content">
    <h1>All our news</h1>
</div>
<div class="news-dashbord">
    <?php
    foreach ($data->news as $value) {
        $title = $value['title'];
        $id = $value['id'];
        $date = $value['date'];
        $author = $value['author'];
        $content = $value['content'];
        echo "<div class='news-dashbord-header'>";
        echo "<h3>$title</h3>";
        echo "</div>";
        echo "<div class='news-dashbord-body'>";
        echo "<p>" . substr($content, 0, 20) . ' ... ' . "<a href =" .
        "'News/Page?id=$id' >Would you like to know more?</a>" . "</p>";
        echo "</div>";
        echo "<div class='news-dashbord-footer'>";
        echo "<h5> Date: $date </h5>";
        echo "<h35> Author: $author </h5>";
        echo "</div>";
    }
    ?>
    <div class="main-content">
        <nav>
            <ul class="pagination">
                <?php
                $rows = $data->countRows;
                $actualPage = $data->actualPage;
                $countPage = $rows / 8;
                $viewPationation = function () use ($actualPage, $countPage) {
                    if ($actualPage > $countPage) {
                        echo "<li class='page-item'><a class='page-link' href = '/News?id=0'>" .
                        0 . "</a></li>";
                        return;
                    }
                    if ($actualPage == 0 & $countPage <= 1) {
                        $id = 0;
                        echo "<li class='page-item'><a class='page-link' href = '/News?id=$id'>" .
                        $id . "</a></li>";
                        return;
                    }
                    $countPage = round($countPage, 0, PHP_ROUND_HALF_EVEN);
                    if ($actualPage != 0) {
                        echo "<li class='page-item'><a class='page-link' href = 
                        '/News?id=" . $actualPage - 1 . "'>" . $actualPage - 1 . "</a></li>";
                    }
                    if ($actualPage + 1 == $countPage) {
                        echo "<li class='page-item'><a class='page-link' href = '/News?id=" .
                        $actualPage . "'>" . $actualPage . "</a></li>";
                        echo "<li class='page-item'><a class='page-link' href = '/News?id=" .
                        $actualPage + 1 . "'>" . $actualPage + 1 . "</a></li>";
                        return;
                    }
                    for ($i = 0; $actualPage + $i < $countPage && $i <= 3; $i++) {
                        echo "<li class='page-item'><a class='page-link' href = '/News?id=" .
                        $actualPage + $i . "'>" . $actualPage + $i . "</a></li>";
                    }
                };
                $viewPationation();
                ?>
            </ul>
        </nav>
    </div>
</div>