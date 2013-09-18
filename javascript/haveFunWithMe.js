function oralFun()
{
	if (annyang)
	{
		var commands = { 'next' : changeVideo() };
		annyang.init(commands);
		annyang.start();
	}
	else
	{
		console.log("No oral fun today...");
	}
}