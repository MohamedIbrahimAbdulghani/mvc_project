<?php

use Mvc\Project\core\route;


route::get("hamada", ["users", "index"]);
route::get("hamada/edit", ["users", "edit"]);
