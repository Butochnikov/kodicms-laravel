<?php namespace KodiCMS\CMS;

use Route;
use Illuminate\Routing\Router;
use KodiCMS\ModulesLoader\ModuleContainer as BaseModuleContainer;

class ModuleContainer extends BaseModuleContainer
{
	/**
	 * @param Router $router
	 */
	protected function loadSystemRoutes(Router $router)
	{
		Route::before(function()
		{
			Route::group(['namespace' => $this->getControllerNamespace(), 'prefix' => backend_url()], function ()
			{
				Route::get('cms/{file}.{ext}', 'System\VirtualMediaLinksController@find')
					->where('file', '.*')
					->where('ext', '(css|js|png|jpg|gif|otf|eot|svg|ttf|woff)');
			});
		});
	}
}