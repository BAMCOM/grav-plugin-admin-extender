# Grav Admin Extender

This Grav plugin allows customization of the Grav admin interface.

1. Create a custom admin theme in your themes folder. Don't add the usual theme PHP, YAML, and Blueprints files, as you don't want the admin theme to show up in your list of installable front-end themes.

2. Install the Admin Extender. Click on the Plugin to change the theme folder name to your custom admin theme. This will add your themes 

3. If you want to completely replace all CSS / JS references (`theme_url` variable in Twig) in plugins/admin/themes/grav to your custom theme, change that setting to Yes.

4. Admin Extender adds a `theme_custom_url` variable to your templates (regardless of the override setting) so you can import extend the assets with CSS / JS of your own in your custom theme folder.