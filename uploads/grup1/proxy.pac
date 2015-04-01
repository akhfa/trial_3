function FindProxyForURL(url, host)
{

   if (isPlainHostName(host) || 
	    dnsDomainIs(host, ".sbm.itb.ac.id"))
      	    return "PROXY cache.itb.ac.id:8080";

   else if (isPlainHostName(host) ||
            dnsDomainIs(host, ".itb.ac.id") || 
            dnsDomainIs(host, ".informatika.org") || 
            dnsDomainIs(host, ".kambing.ui.edu") || 
            dnsDomainIs(host, ".kambing.ui.ac.id") || 
	    isInNet(host, "167.205.0.0", "255.255.0.0"))
            return "DIRECT";
   else 
		return "PROXY cache.itb.ac.id:8080";
}
