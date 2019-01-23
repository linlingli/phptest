		<div data-role="header" data-position="fixed">
			<h3>Lab</h3>
			<div data-role="navbar">
				<ul>
					<li><a href="/Lab_Login_MVC/Home/Index" data-icon="home" data-theme="b" data-ajax="false">Home</a></li>
					<?php if (!isset($_SESSION["userId"])) : ?>
					<li><a href="/Lab_Login_MVC/Member/Login" data-icon="star" data-theme="b" data-ajax="false">Login</a></li>
					<?php else: ?>
					<li><a href="/Lab_Login_MVC/Member/Logout" data-icon="star" data-theme="b" data-ajax="false">Logout</a></li>
					<?php endif; ?>
					<li><a href="/Lab_Login_MVC/Home/Member" data-icon="gear" data-theme="b" data-ajax="false">MemberOnly</a></li>
				</ul>
			</div>
		</div>
