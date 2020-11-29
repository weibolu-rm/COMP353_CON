<?php // 40058095

function print_posts($conn) {
    require_once "functions_inc.php";
    $sql = "SELECT * FROM posts ORDER BY post_id DESC;";
    $query_result = mysqli_query($conn, $sql);
    echo '<div class="row mb-2 margin-top">';
    if($query_result) {
        while($row = mysqli_fetch_assoc($query_result)) {
            $user = fetch_user_by_id($conn, $row["user_id"]);
            

        echo '
            <div class="col-md-6">
                <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">'.$user["name"].'</strong>
                        <h3 class="mb-0">'. $row["title"] .'</h3>
                        <div class="mb-1 text-muted">'. $row["post_date"] .'</div>
                        <p class="card-text mb-auto">'. $row["content"] .'</p>
                        <!-- <a href="#" class="stretched-link">Continue reading</a> -->
                    </div>
                    <!-- <div class="col-auto d-none d-lg-block">
                    <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                    </div> -->
                </div>
            </div>';
        }
    }

    echo '</div>';
    mysqli_free_result($query_result);
    mysqli_close($conn);
}