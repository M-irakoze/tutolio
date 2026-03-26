# Deployment Guide for Render.com with TiDB

This guide will help you deploy your Programming Tutorials Platform on Render.com using TiDB as the database.

## Prerequisites

1. **Render.com Account**: Sign up at [render.com](https://render.com)
2. **TiDB Account**: Sign up at [tidbcloud.com](https://tidbcloud.com)
3. **GitHub Repository**: Push your code to a GitHub repository

## Step 1: Set Up TiDB Database

1. **Create TiDB Cluster**:
   - Log in to TiDB Cloud
   - Click "Create Cluster"
   - Choose "Developer Tier" (free) or paid tier
   - Select your preferred region
   - Set cluster name (e.g., `tutorials-platform`)

2. **Get Connection Details**:
   - Once cluster is ready, click "Connect"
   - Copy the connection string
   - Note down:
     - Host (e.g., `gateway01.ap-southeast-1.prod.aws.tidbcloud.com`)
     - Port (usually `4000`)
     - Username
     - Password
     - Database name

3. **Set Up Database**:
   ```sql
   -- Connect to your TiDB cluster using MySQL client
   -- Run the setup_database.sql script
   ```

## Step 2: Configure Environment Variables

1. **In Render Dashboard**:
   - Go to your service settings
   - Add the following environment variables:

   ```
   DB_HOST=gateway01.ap-southeast-1.prod.aws.tidbcloud.com
   DB_PORT=4000
   DB_NAME=tutorials_platform
   DB_USER=your_tidb_username
   DB_PASS=your_tidb_password
   APP_ENV=production
   APP_DEBUG=false
   BASE_URL=https://your-app-name.onrender.com
   ```

## Step 3: Deploy to Render

### Option A: Using render.yaml (Recommended)

1. **Push to GitHub**:
   ```bash
   git add .
   git commit -m "Add Render deployment configuration"
   git push origin main
   ```

2. **Create New Web Service**:
   - Go to Render Dashboard
   - Click "New +" → "Web Service"
   - Connect your GitHub repository
   - Render will automatically detect `render.yaml`
   - Click "Create Web Service"

### Option B: Manual Configuration

1. **Create Web Service**:
   - Go to Render Dashboard
   - Click "New +" → "Web Service"
   - Connect your GitHub repository
   - Configure:
     - **Runtime**: Docker
     - **Build Command**: Leave empty
     - **Start Command**: Leave empty
     - **Health Check Path**: `/`

## Step 4: Verify Deployment

1. **Check Build Logs**:
   - Monitor the build process in Render dashboard
   - Fix any errors that appear

2. **Test the Application**:
   - Visit your app URL: `https://your-app-name.onrender.com`
   - Test database connectivity
   - Verify all pages load correctly

## Step 5: SSL Configuration (Optional)

If TiDB requires SSL:

1. **Download SSL Certificates** from TiDB Cloud
2. **Upload to Render** or use environment variables:
   ```
   DB_SSL_CA=/path/to/ca.pem
   DB_SSL_CERT=/path/to/client-cert.pem
   DB_SSL_KEY=/path/to/client-key.pem
   ```

## Troubleshooting

### Common Issues

1. **Database Connection Failed**:
   - Check environment variables
   - Verify TiDB cluster is running
   - Ensure SSL settings are correct

2. **Build Errors**:
   - Check Dockerfile syntax
   - Verify all required files are committed

3. **404 Errors**:
   - Ensure `.htaccess` is working (if using Apache)
   - Check file permissions

4. **Slow Performance**:
   - Enable caching in production
   - Optimize database queries
   - Consider using Render's paid tiers

### Debug Mode

To enable debug mode temporarily:
```
APP_DEBUG=true
```

Remember to disable in production!

## Environment-Specific Configurations

### Local Development
```bash
# Copy .env.example to .env
cp .env.example .env

# Edit .env with your local settings
DB_HOST=localhost
DB_PORT=3306
DB_USER=root
DB_PASS=
```

### Production (Render)
Environment variables are set in Render dashboard, not in .env files.

## Monitoring

1. **Render Dashboard**: Monitor service health and logs
2. **TiDB Cloud**: Monitor database performance
3. **Application Logs**: Check for errors and performance issues

## Scaling

When ready to scale:

1. **Render**: Upgrade to paid plans for better performance
2. **TiDB**: Scale your cluster based on traffic
3. **Caching**: Implement Redis or similar for better performance
4. **CDN**: Use CDN for static assets

## Security Tips

1. **Environment Variables**: Never commit sensitive data
2. **Database Security**: Use strong passwords
3. **HTTPS**: Always use HTTPS in production
4. **Regular Updates**: Keep dependencies updated

## Backup Strategy

1. **TiDB**: Enable automatic backups in TiDB Cloud
2. **Code**: Version control with Git
3. **Assets**: Consider cloud storage for media files

## Support

- **Render Documentation**: [render.com/docs](https://render.com/docs)
- **TiDB Documentation**: [docs.pingcap.com/tidb](https://docs.pingcap.com/tidb)
- **GitHub Issues**: Report issues in your repository
