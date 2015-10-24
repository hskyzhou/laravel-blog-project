<div ng-controller="MenuUpdateController">
	<div class="portlet light bordered">
		<div class="portlet-title">
			<div class="caption font-green-sharp">
				<i class="icon-settings font-green-sharp"></i>
				<span class="caption-subject bold uppercase">Modal</span>
				<span class="caption-helper">ui.bootstrap.modal</span>
			</div>
			<div class="tools">
				<a href="" class="collapse">
				</a>
				<a href="#portlet-config" data-toggle="modal" class="config" >
				</a>
				<a href="" class="reload">
				</a>
				<a href="" class="fullscreen">
				</a>
				<a href="" class="remove">
				</a>
			</div>
		</div>
		<div class="portlet-body">
			<div class="row">
				<div class="col-md-6">
					<div ng-controller="ModalDemoCtrl">
					    <script type="text/ng-template" id="myModalContent.html">
					        <div class="modal-header">
					            <h3 class="modal-title">I am a modal!</h3>
					        </div>
					        <div class="modal-body">
					            <ul>
					                <li ng-repeat="item in items">
					                    <a ng-click="selected.item = item">{{ item }}</a>
					                </li>
					            </ul>
					            Selected: <b>{{ selected.item }}</b>
					        </div>
					        <div class="modal-footer">
					            <button class="btn btn-primary" ng-click="ok()">OK</button>
					            <button class="btn btn-warning" ng-click="cancel()">Cancel</button>
					        </div>
					    </script>

					    <button class="btn btn-default" ng-click="open()">Open me!</button>
					    <button class="btn btn-default" ng-click="open('lg')">Large modal</button>
					    <button class="btn btn-default" ng-click="open('sm')">Small modal</button>
					    <div ng-show="selected">Selection from a modal: {{ selected }}</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="scroller" style="height: 400px">
                        <p><code>$modal</code> is a service to quickly create AngularJS-powered modal windows.
						Creating custom modals is straightforward: create a partial view, its controller and reference them when using the service.</p>

						<p>The <code>$modal</code> service has only one method: <code>open(options)</code> where available options are like follows:</p>

						<ul>
						<li><code>templateUrl</code> - a path to a template representing modal's content</li>
						<li><code>template</code> - inline template representing the modal's content</li>
						<li><code>scope</code> - a scope instance to be used for the modal's content (actually the <code>$modal</code> service is going to create a child scope of a provided scope). Defaults to <code>$rootScope</code></li>
						<li><code>controller</code> - a controller for a modal instance - it can initialize scope used by modal. Accepts the "controller-as" syntax in the form 'SomeCtrl as myctrl'; can be injected with <code>$modalInstance</code></li>
						<li><code>controllerAs</code> - an alternative to the controller-as syntax, matching the API of directive definitions. Requires the <code>controller</code> option to be provided as well</li>
						<li><code>resolve</code> - members that will be resolved and passed to the controller as locals; it is equivalent of the <code>resolve</code> property for AngularJS routes</li>
						<li><code>backdrop</code> - controls presence of a backdrop. Allowed values: true (default), false (no backdrop), <code>'static'</code> - backdrop is present but modal window is not closed when clicking outside of the modal window.</li>
						<li><code>keyboard</code> - indicates whether the dialog should be closable by hitting the ESC key, defaults to true</li>
						<li><code>backdropClass</code> - additional CSS class(es) to be added to a modal backdrop template</li>
						<li><code>windowClass</code> - additional CSS class(es) to be added to a modal window template</li>
						<li><code>windowTemplateUrl</code> - a path to a template overriding modal's window template</li>
						<li><code>size</code> - optional size of modal window. Allowed values: <code>'sm'</code> (small) or  <code>'lg'</code> (large). Requires Bootstrap 3.1.0 or later</li>
						</ul>

						<p>The <code>open</code> method returns a modal instance, an object with the following properties:</p>

						<ul>
						<li><code>close(result)</code> - a method that can be used to close a modal, passing a result</li>
						<li><code>dismiss(reason)</code> - a method that can be used to dismiss a modal, passing a reason</li>
						<li><code>result</code> - a promise that is resolved when a modal is closed and rejected when a modal is dismissed</li>
						<li><code>opened</code> - a promise that is resolved when a modal gets opened after downloading content's template and resolving all variables</li>
						</ul>

						<p>In addition the scope associated with modal's content is augmented with 2 methods:</p>

						<ul>
						<li><code>$close(result)</code></li>
						<li><code>$dismiss(reason)</code></li>
						</ul>

						<p>Those methods make it easy to close a modal window without a need to create a dedicated controller.</p>
					</div>
                </div>
			</div>	
		</div>
	</div>
</div>