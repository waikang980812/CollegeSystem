<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
  <html>
  <body>
  <h2>Users</h2>
  <table border="1">
    <tr bgcolor="#9acd32">
      <th>User ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Contact Number</th>
      <th>Gender</th>
      <th>Birthday</th>
      <th>Role</th>
    </tr>
    <xsl:for-each select="Users/user">
    <tr>
      <td><xsl:value-of select="id"/></td>
      <td><xsl:value-of select="name"/></td>
      <td><xsl:value-of select="email"/></td>
      <td><xsl:value-of select="contact"/></td>
      <td><xsl:value-of select="gender"/></td>
      <td><xsl:value-of select="birthdate"/></td>
      <td><xsl:value-of select="role/title"/></td>
    </tr>
    </xsl:for-each>
  </table>
  </body>
  </html>
</xsl:template>

</xsl:stylesheet>