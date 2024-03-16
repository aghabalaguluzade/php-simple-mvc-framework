<?php

namespace Core;

enum Response: int {
	const NOT_FOUND = 404;
	const FORBIDDEN = 403;
}