<?xml version="1.0" encoding="UTF-8"?><xsl:stylesheet version="1.0" xmlns="http://www.w3.org/1999/xhtml" xmlns:svg="http://www.w3.org/2000/svg"	xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:sfs="http://schema.slothsoft.net/farah/sitemap">	<xsl:variable name="pages" select="/*/*[@name = 'sites']//sfs:page" />	<xsl:template match="/*">		<div>			<div class="minecraft-home">				<div>					<div>						<fieldset class="minecraft-chat">							<xsl:variable name="page" select="$pages[@uri = '/Minecraft/Chat/']" />							<legend>								<a href="{$page/@uri}">									<xsl:value-of select="$page/@title" />								</a>							</legend>							<xsl:copy-of select="*[@name='chat-short']/node()" />						</fieldset>					</div>					<div>						<fieldset class="minecraft-news">							<xsl:variable name="page" select="$pages[@uri = '/Minecraft/News/']" />							<legend>								<a href="{$page/@uri}">									<xsl:value-of select="$page/@title" />								</a>							</legend>							<xsl:for-each select="*[@name='news']//news[1]">								<article>									<h2>										<xsl:value-of select="@title" />										<small class="number">											<xsl:text>&#160;(</xsl:text>											<xsl:value-of select="@date" />											<xsl:text>)</xsl:text>										</small>									</h2>									<xsl:copy-of select="*" />								</article>							</xsl:for-each>						</fieldset>					</div>				</div>			</div>			<xsl:copy-of select="*[@name='log']/*" />		</div>	</xsl:template></xsl:stylesheet>